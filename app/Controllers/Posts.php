<?php

namespace App\Controllers;

use App\Entities\Post_type;
use App\Entities\Post;
use App\Entities\Comment;
use App\Models\Post_TypeModel;
use App\Models\PostModel;
use App\Models\FiliereModel;
use App\Models\CommentModel;
use App\Models\UserModel;


class Posts extends BaseController
{
  private $model;
  private $post_type;
  private $filiere;
  private $comment;
  private $user;

  public function __construct()
  {
    $this->model = new PostModel();
    $this->filiere = new FiliereModel();
    $this->post_type = new Post_typeModel();
    $this->comment = new CommentModel();
    $this->user = new UserModel();
  }

  public function newPostForm()
  {
    $Post_types = $this->post_type->findAll();
    $filieres = $this->filiere->findAll();
    return view('Post/newPost', [
      "Post_types" => $Post_types,
      "filieres" => $filieres
    ]);
  }

  public function newPost()
  {
    $file = $this->request->getFile('attachement_url');
    if (!$file->isValid()) {
      $errorCode = $file->getError();
      if ($errorCode == UPLOAD_ERR_NO_FILE) {
        return redirect()->back()->with("error", "Please select an file or image!!")
          ->withInput();
      }
    }

    $fileSize = $file->getSizeByUnit("mb");
    if ($fileSize > 50) {
      return redirect()->back()
        ->with("error", "image size is too big!!")
        ->withInput();
    }

    $type = $file->getMimeType();

    $types = ["image/png", "image/jpg", "image/jpeg", "application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
    if (!in_array($type, $types)) {
      return redirect()->back()
        ->with("error", "file type format is invalid!!")
        ->withInput();
    }

    $file->move('./post_attachements');
    //$data = new PostModel();
    $post = new Post();
    $post->post_attachement_url = $file->getName();
    $post->post_title = $this->request->getPost('title');
    $post->post_content = $this->request->getPost('post_content');

    if (session("user_cat_id") == 4) {
      $post->post_type_id = 1;
      $post->post_status_id = 1;
    } else {
      $post->post_type_id = $this->request->getPost('post_type_id');
      $post->post_status_id = 2;
    }


    $filier_id = $this->request->getPost('filiere_id');

    $post->filiere_id = $filier_id == 0 ? NULL : $filier_id;
    $post->user_id = session("user_id");
    $added = $this->model->insert($post);
    if ($added) {
      return redirect()->to("Posts/allPosts")->with("success", "Post created!!");
    } else
      return redirect()->back()->with('errors',  $this->model->errors())->withInput();
  }

  public function allPosts()
  {
    $posts = $this->model->join("user", "user.user_id = post.user_id ")
      ->join("post_type", "post.post_type_id = post_type.post_type_id")
      ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
      ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
      ->where("post_status_id", "2")
      ->orderBy('post.created_at', 'DESC')
      ->findAll();

    return view("Post/allPosts", [
      "posts" => $posts,
    ]);
  }
  public function allPostsX()
  {
    $posts = $this->model->join("user", "user.user_id = post.user_id ")
      ->join("post_type", "post.post_type_id = post_type.post_type_id")
      ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
      ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
      ->orderBy("post_id", "DESC")
      ->findAll();
    echo json_encode($posts);
  }
  public function suggestedPosts()
  {
    $user = $this->user
      ->where('user_id', session('user_id'))
      ->join('group_', "group_.group_id= user.group_id")
      ->first();
    $posts = $this->model
      ->where('post.filiere_id', $user->filiere_id)
      ->join("user", "user.user_id = post.user_id ")
      ->join("post_type", "post.post_type_id = post_type.post_type_id")
      ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
      ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
      ->orderBy("post_id", "DESC")
      ->findAll();
    return view("Post/allPosts", [
      "posts" => $posts,
    ]);
  }

  public function viewPost($id)
  {
    $post = $this->model->where("post_id", $id)
      ->join("post_type", "post.post_type_id = post_type.post_type_id")
      ->join("user", "user.user_id = post.user_id ")
      ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
      ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
      ->first();

    $comments = $this->comment
      ->select("comment.created_at, user.first_name, user.last_name , comment.comment_content ")
      ->join("user", "user.user_id = comment.user_id ")
      ->where("post_id", $id)
      ->findAll();

    return view("Post/showPost", ["post" => $post, "comments" => $comments]);
  }
  public function displayPdf($id)
  {
    $post = $this->model->where("post_id", $id)->first();
    // The location of the PDF file
    // on the server
    $filename = "post_attachements/" . $post->post_attachement_url;

    // Header content type
    header("Content-type: application/pdf");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . filesize($filename));
    header("Cache-Control: maxage=1");
    header("Pragma: public");
    header("Content-Disposition: inline; filename=" . $filename . "");
    header("Content-Description: PHP Generated Data");

    // Send the file to the browser.
    readfile($filename);
  }
  public function addComment($id)
  {
    $post = $this->model->where("post_id", $id)->first();
    $comment = new Comment();
    $comment->post_id = $post->post_id;
    $comment->comment_content = $this->request->getPost("comment_content");
    $comment->user_id = session("user_id");
    if ($this->comment->insert($comment)) {
      return redirect()->back()->with("success", "Comment Added");
    } else {
      return redirect()->back()->with("error", "error");
    }
  }

  // Pending posts
  public function pendingPosts()
  {
    $posts = $this->model->join("user", "user.user_id = post.user_id ")
      ->join("post_type", "post.post_type_id = post_type.post_type_id")
      ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
      ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
      ->where("post_status_id", "1")
      ->orderBy('post.created_at', 'ASC')
      ->findAll();

    return view("Post/pendingPosts", [
      "posts" => $posts
    ]);
  }

  // Scheduled posts
  public function scheduledPosts()
  {
    $posts = $this->model->join("user", "user.user_id = post.user_id ")
      ->join("post_type", "post.post_type_id = post_type.post_type_id")
      ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
      ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
      ->where("post_status_id", "1")
      ->orderBy("post_id", "DESC")
      ->findAll();

    return view("Post/pendingPosts", [
      "posts" => $posts
    ]);
  }
  public function acceptPost($id)
  {

    $db = \Config\Database::connect();


    $builder = $db->table('post');
    $data = [
      'post_status_id' => 2
    ];

    $builder->where('post_id', $id);
    if ($builder->update($data)) {
      return redirect()->to("/posts/allPosts/")->with("success", "votre modifications sont effectuées!!");
    }
  }
  public function removePost($id)
  {
    $tb = $this->model->where('post_id',  $id)->first();

    if ($tb !== null) {

      $this->model->where('post_id', $id)->delete();
      $posts = $this->model->join("user", "user.user_id = post.user_id ")
        ->join("post_type", "post.post_type_id = post_type.post_type_id")
        ->join("filiere", "post.filiere_id = filiere.filiere_id", "left")
        ->join("user_cat", "user.user_cat_id = user_cat.user_cat_id")
        ->where("post_status_id", "2")
        ->orderBy("post_id", "DESC")
        ->findAll();
      return view("Post/allPosts", [
        "posts" => $posts,
      ]);
    }
  }
}

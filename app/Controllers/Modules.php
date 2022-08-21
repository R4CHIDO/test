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
use App\Models\ModuleModel;
use App\Models\FileModel;
use App\Models\File_TypeModel;
use App\Entities\Module;
use App\Entities\File;
use App\Entities\FileType;


class Modules extends BaseController
{
    private $model;
    private $post_type;
    private $filiere;
    private $comment;
    private $user;
    private $file;
    private $filetype;

    public function __construct()
    {
        $this->model = new ModuleModel();
        $this->filiere = new FiliereModel();
        $this->post_type = new Post_typeModel();
        $this->comment = new CommentModel();
        $this->user = new UserModel();
        $this->file = new FileModel();
        $this->filetype = new File_TypeModel();
    }
    public function getModulesForTrainer()
    {
        $user = $this->user
            ->where('user_id', session('user_id'))
            ->join('group_', "group_.group_id= user.group_id")
            ->first();
        $filiereId = $user->filiere_id;
        $modules = $this->model->where("module.filiere_id", $filiereId)
            ->join('filiere', "filiere.filiere_id= module.filiere_id")
            ->findAll();
        return view("Modules/ModulesForTrainer", ["modules" => $modules]);
    }

    public function getModulesForTeacher()
    {
        $user = $this->user
            ->where('user_id', session('user_id'))
            ->join('group_', "group_.group_id= user.group_id")
            ->first();
        $modules = $this->model->where("module.user_id", session('user_id'))
            ->join('user', "module.user_id= user.user_id")
            ->join('filiere', "filiere.filiere_id= module.filiere_id")
            ->findAll();
        return view("Modules/ModulesForTeacher", ["modules" => $modules]);
    }




    public function getModules()
    {

        $modules = $this->model
            ->join('user', "module.user_id= user.user_id")
            ->join('filiere', "filiere.filiere_id= module.filiere_id")
            ->orderBy('module_id', 'DESC')
            ->findAll();

        return view("Modules/Modules", ["modules" => $modules]);
    }

    public function newModuleForm()
    {
        $teachers = $this->user->where('user_cat_id', 3)
            ->findAll();
        $filieres = $this->filiere->findAll();
        return view("Modules/newModuleForm", ["filieres" => $filieres, "teachers" => $teachers]);
    }
    public function deleteModule($id)
    {
        $module = $this->model->where('module_id',  $id)->first();

        if ($module !== null) {

            $this->model->where('module_id', $id)->delete();
            return redirect()->back()->with("success", "Module deleted");
        } else
            return redirect()->to("Modules/getModules")->with("error", "Module not found");
    }
    public function newModule()
    {
        $module = new Module();

        $module->filiere_id = $this->request->getPost("filiere_id");
        $module->user_id = $this->request->getPost("user_id");
        $module->module_label = $this->request->getPost("module_label");
        $module->MH = $this->request->getPost("MH");
        if ($this->model->insert($module)) {
            return redirect()->to("Modules/getModules")->with("success", "Module added successfully");
        } else {
            return redirect()->back()->with("errors", $this->model->errors());
        }
    }
    public function editModuleForm($id)
    {
        $module = $this->model->where('module_id',  $id)->first();
        $teachers = $this->user->where('user_cat_id', 3)
            ->findAll();
        $filieres = $this->filiere->findAll();

        return view("Modules/editModuleForm", ["module" => $module, "filieres" => $filieres, "teachers" => $teachers]);
    }
    public function editModule($id)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('module');
        $data = [
            'module_label' => $this->request->getPost('module_label'),
            'MH' => $this->request->getPost('MH'),
            'filiere_id' => $this->request->getPost('filiere_id'),
            'user_id' => $this->request->getPost('user_id'),
        ];

        $builder->where('module_id', $id);
        if ($builder->update($data)) {
            return redirect()->to("/Modules/getModules/")->with("success", "Module has been updated successfully");
        }
    }
    public function displayCourses($id)
    {
        $courses = $this->file->where(['file_type_id' => 2, 'module_id' => $id])->orderBy('file_id', 'DESC')->findAll();
        return view('Modules/courses', ['courses' => $courses, "id" => $id]);
    }

    public function displayTPS($id)
    {
        $tps = $this->file->where(['file_type_id' => 1, 'module_id' => $id])->orderBy('file_id', 'DESC')->findAll();
        return view('Modules/tps', ['tps' => $tps, "id" => $id]);
    }
    public function displayExams($id)
    {
        $exams = $this->file->where(['file_type_id' => 3, 'module_id' => $id])->orderBy('file_id', 'DESC')->findAll();
        return view('Modules/exams', ['exams' => $exams, "id" => $id]);
    }

    public function newFileForm()
    {
        $file_types = $this->filetype->findAll();
        $modules = $this->model->where("module.user_id", session('user_id'))
            ->join('user', "module.user_id= user.user_id")
            ->join('filiere', "filiere.filiere_id= module.filiere_id")
            ->findAll();
        return view('Modules/newFileForm', ['file_types' => $file_types, 'modules' => $modules]);
    }
    public function newFIle()
    {
        $file_ = $this->request->getFile('file_url');
        if (!$file_->isValid()) {
            $errorCode = $file_->getError();
            if ($errorCode == UPLOAD_ERR_NO_FILE) {
                return redirect()->back()->with("error", "Please select an file !!")
                    ->withInput();
            }
        }

        $fileSize = $file_->getSizeByUnit("mb");
        if ($fileSize > 50) {
            return redirect()->back()
                ->with("error", "file size is too big!!")
                ->withInput();
        }

        $type = $file_->getMimeType();

        $types = ["image/png", "image/jpg", "image/jpeg", "application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
        if (!in_array($type, $types)) {
            return redirect()->back()
                ->with("error", "file type format is invalid!!")
                ->withInput();
        }

        $file_->move('./module_files');
        //$data = new PostModel();
        $file = new File();
        $file->file_url = $file_->getName();
        $file->file_label = $this->request->getPost('file_label');
        $file->file_type_id = $this->request->getPost('file_type_id');
        $file->module_id = $this->request->getPost('module_id');
        $added = $this->file->insert($file);
        if ($added) {
            return redirect()->to("Modules/getModulesForTeacher")->with("success", "Post created!!");
        } else
            return redirect()->back()->with('errors',  $this->model->errors())->withInput();
    }
}

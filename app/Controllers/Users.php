<?php

namespace App\Controllers;


use App\Models\UserModel;
use App\Entities\User;
use App\Models\GroupModel;


class Users extends BaseController
{
  private $user;
  private $group;

  public function __construct()
  {
    $this->user = new UserModel();
    $this->group = new GroupModel();

  }

  public function addMemberform(){

    $groups = $this->group->findAll();

    return view('Users/addMember',["groups" => $groups]
    );
  }

  public function allMembers($orderByOrfilterBy = null,$type = null){
    $users = $this->user
    ->join('group_', 'group_.group_id = user.group_id')
    ->join('filiere', 'group_.filiere_id = filiere.filiere_id')
    ->join('user_cat','user_cat.user_cat_id = user.user_cat_id');
    
    if($orderByOrfilterBy == 'SortBy'){

      $orderMethod = '';

      switch($type){
        case 'Name':
          $orderMethod = 'first_name';
          break;
        case 'Gender':
          $orderMethod = 'gender';
          break;
        case 'MemberType':
          $orderMethod = 'user.user_cat_id';
          break;
      }

      $users = $users->orderBy($orderMethod,'asc');
    }
    else if($orderByOrfilterBy == 'FilterBy'){
      $filterMethod = '';
      
      switch($type){
        case 'Name':
          $filterMethod = 'last_name';
          break;
        case 'Gender':
          $filterMethod = 'gender';
          break;
        case 'MemberType':
          $filterMethod = 'user_cat_id';
          break;
      }

      $users = $users->orderBy($filterMethod,'asc');
    }
    return view("Users/allMembers",[
     "users" => $users->findAll()
   ]);
  }

  public function memberRequests(){

    $users = $this->user
     ->join('group_', 'group_.group_id = user.group_id')
     ->join('filiere', 'group_.filiere_id = filiere.filiere_id')
     ->where('user_status_id', 2)
     ->findAll();

     return view("Users/memberRequests",[
      "users" => $users
    ]);
  }

  public function addMember(){
    $user = new User();
    $user->first_name = $this->request->getPost('first_name');
    $user->last_name = $this->request->getPost('last_name');
    $user->email    = $this->request->getPost('email');
    $user->gender    = $this->request->getPost('gender');
    $user->password = $this->request->getPost('password');
    $user->adress = $this->request->getPost('adress');
    $user->birth_date = $this->request->getPost('birth_date');
    $user->user_cat_id = $this->request->getPost('user_cat_id');
    $user->tel = $this->request->getPost('tel');
    if($this->request->getPost('user_cat_id')== 4){
      $user->group_id = $this->request->getPost('group_id');
    }else{
      $user->group_id = NULL;
    }
    
    $user->user_status_id = 1 ;
    if($this->user->insert($user)){           
        return redirect()->to("/Users/allMembers")->with("success" , "account created successfuly!!");
    }
    else
        return redirect()->back()->withInput();
  }
}
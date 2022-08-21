<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;
use App\Models\GroupModel;


class Login extends BaseController
{
    private $user;
    private $Group;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->Group = new GroupModel();
    }

    public function index()
    {
        return view('Login/Login');
    }

    public function Register()
    {
        $Groups = $this->Group->findAll();
        return view('Login/register', ["groups" => $Groups ]);
    } 

    public function signin(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user =$this->user->where('email' , $email)->first();
        if($user != null){
            if($password === $user->password){
                $session = session();
                $session->regenerate();
                $session->set('logged', true);
                $session->set('first_name' , $user->first_name);
                $session->set('last_name' , $user->last_name);
                $session->set('user_id' , $user->user_id);
                $session->set('gender', $user->gender);
                $session->set('user_cat_id' , $user->user_cat_id);
                $session->set('email' , $user->email);

                if($user->user_cat_id == 1)
                return redirect()->to('/Dashboard/Admin');

                if($user->user_cat_id == 4){                    
                    $session->set('group_id' , $user->group_id);
                    return redirect()->to('/Dashboard/Stagiaire');
                }
                if($user->user_cat_id == 3)
                    return redirect()->to('/Dashboard/Formateur');
            }else
                return redirect()->back()->with('error' ,  'Incorrect password');
        }else{
            return redirect()->back()->with('error' ,  'Address email introuvable');
        }
    }
    
    public function signup(){
        $user = new User();
        $user->first_name = $this->request->getPost('first_name');
        $user->last_name = $this->request->getPost('last_name');
        $user->email    = $this->request->getPost('email');
        $user->password = $this->request->getPost('password');
        $user->group_id = $this->request->getPost('group_id');

        $user->user_status_id = 2 ;
        if($this->user->insert($user)){           
            return redirect()->to("/Login/")->with("success" , "account created successfuly!!");
        }
        else
            return redirect()->back()->with("error" , "you have to complete the form!");
    } 
    public function logout(){
        
        session()->destroy();
        return redirect()->to('/Login/')->with('success' ,  'deconnecter!!');
    
}
}

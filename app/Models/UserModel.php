<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $useTimestamps = true;  
    protected $returnType    = \App\Entities\User::class;
    protected $allowedFields = ["user_id","first_name","user_status_id","gender","birth_date" , "last_name","email","password","tel",	"adress",	"r_question",	"r_answer","group_id","user_cat_id","created_at","updated_at"];

    protected $validationRules    = [
        'first_name'     => 'required|min_length[3]',
        'last_name'     => 'required|min_length[3]',
        'email'        => 'required|valid_email|is_unique[user.email]',
        'password'        => 'required|min_length[4]',
    ];

    protected $validationMessages = [
        'first_name'        => [
            'required' => 'Enter your fullname please!!',
            'min_length' => 'your name must contain at least 8 caracters ',
        ],
        'last_name'        => [
            'required' => 'Enter your lastname please!!',
            'min_length' => 'your name must contain at least 8 caracters ',
        ],
        'email'  => [
            'required' => 'Enter your email',
            'valid_email' => 'please enter a valid email',
            'is_unique' => 'this email is already used',
        ],
        'password'  => [
            'required' => 'Enter your password',
            'min_length' => 'your password must contain at least 4 caracters ',
        ],
        
    ];
    public function login($email , $password)
    {
        $array =[
            'email' => $email ,
            'password' => $password
        ];
        $db      = \Config\Database::connect();
        return $db->table('user')->where($array)->get()->getFirstRow() ;
    }
}

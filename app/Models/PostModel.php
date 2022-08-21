<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = "post";
    protected $useTimestamps = true;  
    protected $returnType    = \App\Entities\Post::class;
    protected $allowedFields = ["post_title",	"post_content","filiere_id" ,	"post_attachement_url"	,"post_type_id" ,	"user_id"	,"post_status_id"];

    protected $validationRules    = [
        'post_title'     => 'required|min_length[2]',
        'post_content' => 'required|min_length[10]',
        'post_type_id' => 'required',
    ];

    protected $validationMessages = [
       
        
    ];
 
}

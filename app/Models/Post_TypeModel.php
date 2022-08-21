<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_TypeModel extends Model
{
    protected $table = "post_type";
    protected $useTimestamps = false;  
    protected $returnType    = \App\Entities\Post_type::class;
    protected $allowedFields = [];

    protected $validationRules   = [
    ];

    protected $validationMessages = [
       
        
    ];
 
}

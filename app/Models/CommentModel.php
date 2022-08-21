<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = "comment";
    protected $useTimestamps = true; 
    protected $returnType    = \App\Entities\Comment::class;
    protected $allowedFields = ["comment_content", "post_id", "user_id"];
    
    
    protected $validationRules    = [
        'comment_content'     => 'required',
    ];

    protected $validationMessages = [
        'comment_content'        => [
            'required' => 'Empty comment',            
        ],
    ];
}

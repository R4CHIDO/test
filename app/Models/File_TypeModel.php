<?php

namespace App\Models;

use CodeIgniter\Model;

class File_TypeModel extends Model
{
    protected $table = "file_type";
    protected $useTimestamps = false; 
    protected $returnType    = \App\Entities\File_type::class;
    protected $allowedFields = ["file_type_label","file_type_id"];
    
    
    protected $validationRules    = [
        'file_type_label'     => 'required',
    ];

    protected $validationMessages = [
        'file_type_label'        => [
            'required' => 'You must enter the file name',
        ],
    ];
}

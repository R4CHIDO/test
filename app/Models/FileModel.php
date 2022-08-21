<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = "file";
    protected $useTimestamps = false; 
    protected $returnType    = \App\Entities\File::class;
    protected $allowedFields = ["file_label" , "file_url" , "file_type_id"  ,"module_id"];
    
    
    protected $validationRules    = [
        'file_label'     => 'required',
        'file_type_id'     => 'required',
    ];

    protected $validationMessages = [
        'file_label'        => [
            'required' => 'You must enter the file name',
        ],
        'file_type_id'        => [
            'required' => 'You must enter the file type id ',
        ],
    ];
}

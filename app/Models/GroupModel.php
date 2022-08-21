<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = "group_";
    protected $useTimestamps = true; 
    protected $returnType    = \App\Entities\Group_::class;
    protected $allowedFields = ["filiere_id", "group_label"];
    
    
    protected $validationRules    = [
        'filiere_id'     => 'required',
        'group_label'     => 'required',
    ];

    protected $validationMessages = [
        'filiere_id'        => [
            'required' => 'Choose a filiere',
        ],
        'group_label'        => [
            'required' => 'You must enter the group name',
        ],
    ];
}

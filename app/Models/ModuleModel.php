<?php

namespace App\Models;

use CodeIgniter\Model;

class ModuleModel extends Model
{
    protected $table = "module";
    protected $useTimestamps = false; 
    protected $returnType    = \App\Entities\Module::class;
    protected $allowedFields = ["filiere_id", "MH", "module_label", "user_id"];
    
    
    protected $validationRules    = [
        'filiere_id'     => 'required',
        'MH'     => 'required',
        'module_label'     => 'required',
        'user_id'     => 'required',
    ];

    protected $validationMessages = [
        'field'        => [
            'required' => 'Choose a filiere',
        ],
        'MH'        => [
            'required' => 'Enter the masse_horaire',
        ],
        'module_label'        => [
            'required' => 'Enter the module name',
        ],
        'user_id'        => [
            'required' => 'Choose a Teacher',
        ],
    ];
}

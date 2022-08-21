<?php

namespace App\Models;

use CodeIgniter\Model;

class FiliereModel extends Model
{
    protected $table = "filiere";
    protected $useTimestamps = true; 
    protected $returnType    = \App\Entities\Filiere::class;
    protected $allowedFields = ["filiere_label"];
    
    
    protected $validationRules    = [
        'filiere_label'     => 'required',
    ];

    protected $validationMessages = [
        'field'        => [
            'required' => 'You must enter the filiere name',
        ],
    ];
}

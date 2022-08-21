<?php

namespace App\Models;

use CodeIgniter\Model;

class TimeTableModel extends Model
{
    protected $table = "timetable";
    protected $useTimestamps = true; 
    protected $returnType    = \App\Entities\TimeTable::class;
    protected $allowedFields = ["emploi_url", "group_id"];

    //Alert : 
    //we have to use created_at and updated_at fields.
    //This specifies when a TimeTable was created or updated.
    /*
        Query to use:
            ALTER TABLE emploi ADD COLUMN created_at Date
            ALTER TABLE emploi ADD COLUMN updated_at Date
     */
    

    //Alert : 
    //add group_id field to this table in the database and remove it from *group* table
    /*
        Query to use:
            ALTER TABLE TimeTable ADD COLUMN group_id int
            ALTER TABLE group DROP COLUMN group_id
     */
    protected $validationRules    = [
        // 'emploi_url'     => 'required',
        'group_id'     => 'required',
    ];

    protected $validationMessages = [
        // 'emploi_url'        => [
        //     'required' => 'Choose a time table',
        // ],
        'group_id'        => [
            'required' => 'Choose a group',
        ],


    ];
}

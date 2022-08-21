<?php

namespace App\Controllers;

use App\Entities\timetable;
use App\Models\GroupModel;
use App\Models\TimeTableModel;

class TimeTables extends BaseController
{
    private $Group;
    private $model;

    public function __construct()
    {
        $this->Group = new GroupModel();
        $this->model = new TimeTableModel();
    }
    public function newTimeTableForm()
    {
        $Groups = $this->Group->findAll();
        return view('timetable/newTimeTable', ["groups" => $Groups]);
    }

    public function addTimeTable()
    {

        $file = $this->request->getFile('emploi_url');
        if (!$file->isValid()) {
            $errorCode = $file->getError();
            if ($errorCode == UPLOAD_ERR_NO_FILE) {
                return redirect()->back()->with("error", "Please select an image!!")
                    ->withInput();
            }
        }
        $fileSize = $file->getSizeByUnit("mb");
        if ($fileSize > 50) {
            return redirect()->back()
                ->with("error", "image size is too big!!")
                ->withInput();
        }
        $type = $file->getMimeType();

        $types = ["image/png", "image/jpg", "image/jpeg"];
        if (!in_array($type, $types)) {
            return redirect()->back()
                ->with("error", "image format is invalid!!")
                ->withInput();
        }
        $file->move('./timetables');
        //$data = new PostModel();
        $timetable = new timetable($this->request->getPost());
        $timetable->emploi_url = $file->getName();

        $grp = $this->request->getPost("group_id");


        $tb = $this->model->where('group_id',  $grp)->first();

        if ($tb !== null) {

            $this->model->where('group_id', $grp)->delete();
        }


        $added = $this->model->insert($timetable);
        if ($added) {
            return redirect()->to('TimeTables/displayTimeTables')->with("success", "TimeTable added successfuly!!");
        } else
            return redirect()->back()->with('errors',  $this->model->errors())->withInput();
    }

    public function displayTimeTables()
    {
        $timeTables = $this->model->join('group_', 'group_.group_id = timetable.group_id')->orderBy('updated_at', 'DESC')->findAll();
        $Groups = $this->Group->findAll();

        if (session("user_cat_id") == 4) {
            $grp = [session("group_id")];

            $timeTables = $this->model
                ->whereNotIn('timetable.group_id', $grp)
                ->join('group_', 'group_.group_id = timetable.group_id')->orderBy('updated_at', 'DESC')
                ->findAll();

            $myTimeTable = $this->model->where('timetable.group_id', session('group_id'))
                ->join('group_', 'group_.group_id = timetable.group_id')->orderBy('updated_at', 'DESC')->first();

            return view('timetable/studentTimeTables', ["timeTables" => $timeTables, "mine" => $myTimeTable]);
        } else {
            return view('timetable/timeTables', ["timeTables" => $timeTables, "groups" => $Groups]);
        }
    }
    public function editTimeTableForm($id)
    {
        $timeTable = $this->model->where("emploi_id", $id)
            ->join('group_', 'group_.group_id = timetable.group_id')
            ->first();
        return view('timetable/editTimeTable', ["timeTable" => $timeTable]);
    }
    public function editTimeTable($id)
    {
        $db = \Config\Database::connect();

        $file = $this->request->getFile('emploi_url');
        if (!$file->isValid()) {
            $errorCode = $file->getError();
            if ($errorCode == UPLOAD_ERR_NO_FILE) {
                return redirect()->back()->with("error", "Please select an image!!")
                    ->withInput();
            }
        }
        $fileSize = $file->getSizeByUnit("mb");
        if ($fileSize > 50) {
            return redirect()->back()
                ->with("error", "image size is too big!!")
                ->withInput();
        }
        $type = $file->getMimeType();

        $types = ["image/png", "image/jpg", "image/jpeg"];
        if (!in_array($type, $types)) {
            return redirect()->back()
                ->with("error", "image format is invalid!!")
                ->withInput();
        }
        $file->move('./timetables');

        $builder = $db->table('timetable');
        $data = [
            'emploi_url' => $file->getName()
        ];

        $builder->where('emploi_id', $id);
        if ($builder->update($data)) {
            return redirect()->to("/TimeTables/displayTimeTables/")->with("success", "votre modifications sont effectuées!!");
        }
    }
}

<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $view = '';

        if (session("user_cat_id") == 1)
            $view = 'Dashboard/AdminDashboard';
        else if (session("user_cat_id") == 2)
            $view = 'Dashboard/StudentDashboard';
        else if (session("user_cat_id") == 3)
            $view = 'Dashboard/TeacherDashboard';
        else
            $view = 'Dashboard/ModeratorDashboard';

        return view($view);
    }
    public function Admin()
    {
        return view('Dashboard/AdminDashboard');
    }
    public function Stagiaire()
    {
        return view('Dashboard/StudentDashboard');
    }
    public function Formateur()
    {
        return view('Dashboard/TeacherDashboard');
    }
    public function Moderator()
    {
        return view('Dashboard/ModeratorDashboard');
    }
}

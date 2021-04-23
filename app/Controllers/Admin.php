<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        echo view('templates/admin/header');
        echo view('admin/dashboard');
        echo view('templates/admin/footer');
    }

    public function dashboard()
    {   
        $session = \Config\Services::session();

        $accountid = $session->get('username');

        echo view('templates/admin/header');
        echo view('admin/dashboard');
        echo view('templates/admin/footer');
        
    }

    public function manageappointment()
    {
        $model = new AppointmentModel();
        
        $session = \Config\Services::session();

        $accountid = $session->get('accountid');

        $result = $model->retrieveAppointment($accountid);

        echo view('templates/user/header');
        return view('admin/manageappointment', ['appointmentlist' => $result]);

       // echo view('templates/admin/header');
       // echo view('admin/manageappointment');
       // echo view('templates/admin/footer');   
    }
}
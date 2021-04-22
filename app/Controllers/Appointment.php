<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use CodeIgniter\Controller;

class Appointment extends Controller
{
    public function index()
    {
        //
    }

    public function createappointment()
    {
        $model = new AppointmentModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'datetime' => 'required',
        ]))
        {
            $session = \Config\Services::session();

            $accountid = $session->get('accountid');

            foreach($this->request->getPost('servicename') as $field) 
            {
                $result = $model->insertAppointment($this->request->getPost('datetime'), $field, $accountid);
            }
            
            
        }
        else
        {
            $model = new AppointmentModel();
            // Checking account if it exists.
            $result = $model->retrieveServices();

            //print_r($result);
            echo view('templates/admin/header');
            return view('admin/createappointment', ['servicelist' => $result]);
        }
    }

    public function viewappointment()
    {
        echo view('templates/admin/header');
        echo view('admin/viewappointment');
        echo view('templates/admin/footer');
    }
}
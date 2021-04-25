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
            
            echo $this->viewappointment();
        }
        else
        {
            // Checking account if it exists.
            $result = $model->retrieveServices();

            echo view('templates/user/header');
            return view('user/createappointment', ['servicelist' => $result]);
        }
    }

    public function viewappointment()
    {
        $model = new AppointmentModel();
        
        $session = \Config\Services::session();

        $accountid = $session->get('accountid');

        $result = $model->retrieveAppointment($accountid);

        echo view('templates/user/header');
        return view('user/viewappointment', ['appointmentlist' => $result]);
    }
}
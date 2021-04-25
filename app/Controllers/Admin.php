<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\AccountModel;
use CodeIgniter\Controller;
class Admin extends Controller
{
    public function index()
    {
        $model = new StatisticModel();

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

    public function manageallappointments()
    {
        $model = new AppointmentModel();
        
        $result = $model->retrieveAppointment("");

        echo view('templates/admin/header');
        return view('admin/manageappointment', ['appointmentlist' => $result]);
    }

    public function manageallaccounts()
    {
        $model = new AccountModel();
        
        $result = $model->getAccount("");

        echo view('templates/admin/header');
        return view('admin/manageaccount', ['accountlist' => $result]);
    }

    public function viewappointment($appointmentid)
    {
        $model = new AppointmentModel();
        
        $result = $model->retrieveAppointmentbyappointmentid($appointmentid);

        echo view('templates/admin/header');
        return view('admin/viewappointment', ['appointmentlist' => $result]);
    }

    public function changeappointmentstatus()
    {
        $model = new AppointmentModel();

        if ($this->request->getMethod() === 'post')
        {
            $appointmentid =  $this->request->getPost('appointmentid');
            
            $model->updateappointmentstatus($appointmentid);

            echo $this->manageallappointments();
        }
    }

    public function updateAccount()
    {
        $accountModel = new AccountModel();
        $appointmentModel = new Appointmentmodel();

        if($this->request->getMethod() === 'post')
        {
            $accountid =  $this->request->getPost('id');
            $username =  $this->request->getPost('username');
            $contactnumber = $this->request->getPost('contactnumber');
            $userinfoupdate = $this->request->getPost('userinfoupdate');
            $session = \Config\Services::session();
            $emailaddress = $session->get('email');
            
            if(isset($userinfoupdate))// if Save changes button was pressed. Go here.
            {
                echo "a";
                $username =  $this->request->getPost('username');
                $contactnumber = $this->request->getPost('contactnumber');

                $accountModel->updateAccount($accountid,$username,$contactnumber);
   

            }
            else // if Activate/Deactivate button was pressed. Go here.
            {
                echo "b";
                $activate = $this->request->getPost('activateaccountbutton');
                $deactivate = $this->request->getPost('deactivateaccountbutton');
                $status = null;

                echo $activate;
                echo $deactivate;
                if(isset($activate))
                {
                    $status = "ACTIVE";
                }
                else if(isset($deactivate))
                {
                    $status = "INACTIVE";
                }

                if(isset($status))
                {
                    $accountModel->updateaccountstatus($accountid, $status);
                }      
            }
       
            if(!strcmp($emailaddress, "admin@mail.com"))
            {
                echo $this->manageallaccounts();
            }
            else
            {
                $result = $appointmentModel->retrieveAppointment($accountid);

                echo view('templates/user/header');
                return view('user/viewappointment', ['appointmentlist' => $result]);
            }
        }
    }
}
<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
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
        $appointmentModel = new AppointmentModel();
        
        $result = $appointmentModel->retrieveAppointmentbyappointmentid($appointmentid);

        $employeeModel = new EmployeeModel();

        $result2 = $employeeModel->getEmployee("");

        echo view('templates/admin/header');
        return view('admin/viewappointment', ['appointmentlist' => $result, 'employeelist' => $result2]);
    }

    public function changeappointmentstatus()
    {
        $model = new AppointmentModel();

        if ($this->request->getMethod() === 'post')
        {
            $appointmentid =  $this->request->getPost('appointmentid');
            
            $appointmentstatus =  $this->request->getPost('appointmentstatus');

            $employeeid =  $this->request->getPost('employeeid');

            $model->updateappointmentstatus($appointmentid, $appointmentstatus, $employeeid);

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

    public function manageallemployees()
    {
        $model = new EmployeeModel();
        
        $result = $model->getEmployee("");

        echo view('templates/admin/header');
        return view('admin/manageemployee', ['employeelist' => $result]);
    }

    public function viewemployeedashboard($employeeid)
    {   
        $employeeModel = new EmployeeModel();
        
        $appoinmentModel = new AppointmentModel();

        $result1 = $employeeModel->getEmployee($employeeid);
    
        $status = "COMPLETE";
        $result2 = $employeeModel->getTotalEmployeeEarnings($employeeid, $status);

        $status = "PENDING";
        $result3 = $appoinmentModel->countAppointment($employeeid, $status);

        $status = NULL;
        $result4 = $appoinmentModel->countAppointment($employeeid, $status);

        $status = "COMPLETE";
        $result5 = $appoinmentModel->countAppointment($employeeid, $status);

        $percentCompleted = 0;
        if($result4->id > 0)
        {
            $percentCompleted = ($result5->id / $result4->id) * 100;
        }
        $percentCompleted = number_format($percentCompleted, 2);

        $totalearnings = $result2->servicecost * .30; // 70 percent cut for employees

        $result = [
            'name' => $result1->name,
            'totalearnings' => $totalearnings,
            'totalpendingappointments' => $result3->id,
            'totalappointmentsassigned' => $result4->id,
            'percentcompleted' => $percentCompleted,
        ];

        echo view('templates/admin/header');
        return view('admin/employeedashboard', ['employeedata' => $result]);
        
    }
}
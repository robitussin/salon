<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\StatisticsModel;
use App\Models\EmployeeModel;
use App\Models\AppointmentModel;
use App\Models\AccountModel;
use CodeIgniter\Controller;

class Admin extends BaseController
{
    public function index()
    {
        $sessionEmail = $this->session->get('email');
        $sessionStatus = $this->session->get('logged_in');

        echo $this->dashboard();
    }

    public function dashboard()
    {   
        $statisticsModel = new StatisticsModel();

        $result = $statisticsModel->getTotalEarnings();

        $result2 = $statisticsModel->getTotalAppointments("");

        $status = "PENDING";
        $result3 = $statisticsModel->getTotalAppointments($status);

        $status = "COMPLETE";
        $result4 = $statisticsModel->getTotalAppointments($status);

        $status = "CANCELLED";
        $result7 = $statisticsModel->getTotalAppointments($status);

        $percentCompleted = 0;
        if($result4->id > 0)
        {
            $percentCompleted = ($result4->id / $result2->id) * 100;
        }

        $percentCompleted = number_format($percentCompleted, 2);

        $percentPending = 0;
        if($result3->id > 0)
        {
            $percentPending = ($result3->id / $result2->id) * 100;
        }

        $percentPending = number_format($percentPending, 2);

        $percentCancelled= 0;
        if($result7->id > 0)
        {
            $percentCancelled = ($result7->id / $result2->id) * 100;
        }

        $percentCancelled = number_format($percentCancelled, 2);

        $status = "COMPLETE";
        $result5 = $statisticsModel->getTotalEarningsPerMonth($status);
        
        $status = "COMPLETE";
        $result6 = $statisticsModel->getRevenueSource($status);

        $percentHaircut = "";
        $percentManicure = "";
        $percentPedicure = "";
        $percentMassage = "";
        $percentHomeServiceHaircut = "";
        
        foreach($result6 as $res)
        {
            if($result2->id > 0)
            {
                if(!strcmp(strtoupper($res->sourcename), "HAIRCUT"))
                {
                    $percentHaircut = ($res->sourcecount / $result4->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "MANICURE"))
                {
                    $percentManicure = ($res->sourcecount / $result4->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "PEDICURE"))
                {
                    $percentPedicure = ($res->sourcecount / $result4->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "MASSAGE"))
                {
                    $percentMassage = ($res->sourcecount / $result4->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "HOMESERVICEHAIRCUT"))
                {
                    $percentHomeServiceHaircut = ($res->sourcecount / $result4->id) * 100;
                }
            }
        }

        $totalNetEarnings = $result->servicecost * .60; // 60 percent cut for brusko

        $dashboardStatistics = [
            'totalGrossEarnings' => $result->servicecost,
            'totalNetEarnings' => $totalNetEarnings,
            'totalAppointments' => $result2->id,
            'totalCompletedAppointments' => $result4->id,
            'totalPendingAppointments' => $result3->id,
            'percentCompleted' => $percentCompleted,
            'percentPending' => $percentPending,
            'percentCancelled' => $percentCancelled,
            'percentHaircut' => $percentHaircut,
            'percentManicure' => $percentManicure,
            'percentPedicure' => $percentPedicure,
            'percentMassage' => $percentMassage,
            'percentHomeServiceHaircut' => $percentHomeServiceHaircut,
        ];

        echo view('templates/admin/header');
        return view('admin/dashboard', ['statistics' => $dashboardStatistics, 'earningspermonth' => $result5]);
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
           
            $emailaddress = $this->session->get('email');
            
            if(isset($userinfoupdate))// if Save changes button was pressed. Go here.
            {
                $username =  $this->request->getPost('username');
                $contactnumber = $this->request->getPost('contactnumber');

                $accountModel->updateAccount($accountid,$username,$contactnumber);
   

            }
            else // if Activate/Deactivate button was pressed. Go here.
            {
                $activate = $this->request->getPost('activateaccountbutton');
                $deactivate = $this->request->getPost('deactivateaccountbutton');
                $status = null;

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

        // get the total number of pending appointments.
        $status = "PENDING";
        $result3 = $appoinmentModel->countAppointment($employeeid, $status);

        // get the total number of appointments regardless of status.
        $status = NULL;
        $result4 = $appoinmentModel->countAppointment($employeeid, $status);

        // get the total number of completed appointments.
        $status = "COMPLETE";
        $result5 = $appoinmentModel->countAppointment($employeeid, $status);

        // get the total number of completed appointments.
        $status = "CANCELLED";
        $result8 = $appoinmentModel->countAppointment($employeeid, $status);

        $status = "COMPLETE";
        $result6 = $employeeModel->getMonthlyTotalEmployeeEarnings($employeeid, $status);

        $percentCompleted = 0;
        if($result4->id > 0)
        {
            $percentCompleted = ($result5->id / $result4->id) * 100;
        }

        $percentCompleted = number_format($percentCompleted, 2);

        $percentPending = 0;
        if($result4->id > 0)
        {
            $percentPending = ($result3->id / $result4->id) * 100;
        }

        $percentPending = number_format($percentPending, 2);

        $percentCancelled = 0;

        if($result4->id > 0)
        {
            $percentCancelled = ($result8->id / $result4->id) * 100;
        }

        $percentCancelled = number_format($percentCancelled, 2);     

        $totalearnings = $result2->servicecost * .40; // 40 percent cut for employees


        $status = "COMPLETE";
        $result7 = $employeeModel->getEmployeeRevenueSource($employeeid, $status);
     
        $percentHaircut = "";
        $percentManicure = "";
        $percentPedicure = "";
        $percentMassage = "";
        $percentHomeServiceHaircut = "";

        foreach($result7 as $res)
        {
            if($result5->id > 0)
            {
                if(!strcmp(strtoupper($res->sourcename), "HAIRCUT"))
                {
                    $percentHaircut = ($res->sourcecount / $result5->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "MANICURE"))
                {
                    $percentManicure = ($res->sourcecount / $result5->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "PEDICURE"))
                {
                    $percentPedicure = ($res->sourcecount / $result5->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "MASSAGE"))
                {
                    $percentMassage = ($res->sourcecount / $result5->id) * 100;
                }
                else if(!strcmp(strtoupper($res->sourcename), "HOMESERVICEHAIRCUT"))
                {
                    $percentHomeServiceHaircut = ($res->sourcecount / $result5->id) * 100;
                }
            }
        }

        $result = [
            'id' => $result1->id,
            'name' => $result1->name,
            'status' => $result1->status,
            'totalearnings' => $totalearnings,
            'totalpendingappointments' => $result3->id,
            'totalappointmentsassigned' => $result4->id,
            'totalappointmentscompleted' => $result5->id,
            'percentcompleted' => $percentCompleted,
            'percentpending' => $percentPending,
            'percentCancelled' => $percentCancelled,
            'percentHaircut' => $percentHaircut,
            'percentManicure' => $percentManicure,
            'percentPedicure' => $percentPedicure,
            'percentMassage' => $percentMassage,
            'percentHomeServiceHaircut' => $percentHomeServiceHaircut,
        ];

        echo view('templates/admin/header');
        return view('admin/employeedashboard', ['employeedata' => $result, 'employeehistory' => $result6]);
        
    }

    public function addemployee()
    {
        $employeeModel = new EmployeeModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'employeename' => 'required',
            'position' => 'required',
        ]))
        {
            $data = [
                'name' => $this->request->getPost('employeename'),
                'position'  => $this->request->getPost('position'), 
                'status' => 'ACTIVE',
            ];

            if($employeeModel->save($data) == true)
            {
                echo view('templates/admin/header');
                $message = ["A new empoyee has been added"];
                return view('admin/addemployee', ['message' =>  $message]);
            }    
            else
            {
                echo view('templates/admin/header');
                return view('admin/addemployee', ['message' => $employeeModel->errors()]);
            }     
        }
        else
        {
            echo view('templates/admin/header');
            echo view('admin/addemployee');
        }
    }

    public function changeEmployeeStatus($employeeID)
    {
        $employeeModel = new EmployeeModel();

        if ($this->request->getMethod() === 'post')
        {
            $activate = $this->request->getPost('activateaccountbutton');
            $deactivate = $this->request->getPost('deactivateaccountbutton');

            $status = null;
            
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
                if($employeeModel->updateEmployeeStatus($employeeID, $status) == true)
                {
                    echo $this->viewemployeedashboard($employeeID);
                }
            }  
        }
    }

    public function manageServices()
    {
        $model = new ServiceModel();
        $result = $model->getService("");

        echo view('templates/admin/header');
        return view('admin/manageservices', ['servicelist' => $result]);
    }

    public function addService()
    {
        $model = new ServiceModel();
        
        if ($this->request->getMethod() === 'post')
        {
            $data = [
                'servicename' => $this->request->getPost('servicename'),
                'imagename'  => $this->request->getPost('imagename'), 
                'servicecost' => $this->request->getPost('servicecost'),
                'homeservicecost'  => $this->request->getPost('homeservicecost'), 
                'description'  => $this->request->getPost('servicedescription'), 
                'status' => 'ACTIVE',
            ];

            if($model->save($data) == true)
            {
                echo view('templates/admin/header');
                $message = ["A new service has been added"];
                return view('admin/addservice', ['message' =>  $message]);
            }    
            else
            {
                echo view('templates/admin/header');
                return view('admin/addservice', ['message' => $model->errors()]);
            }     
        }
        else
        {
            echo view('templates/admin/header');
            echo view('admin/addservice');
        }
    }

    public function viewService($serviceID)
    {
        $serviceModel = new ServiceModel();
        
        $result = $serviceModel->getService($serviceID);

        echo view('templates/admin/header');
        return view('admin/viewservice', ['servicelist' => $result]);
    }

    public function updateService()
    {
        $serviceModel = new ServiceModel();
  
        if ($this->request->getMethod() === 'post')
        {
            $serviceID = $this->request->getPost('serviceid');
            $serviceCost = $this->request->getPost('servicecost');
            $homeServiceCost = $this->request->getPost('homeservicecost');
            $imageName = $this->request->getPost('imagename');
            $status = $this->request->getPost('servicestatus');

            if(!isset($status))
            {
                $status = $this->request->getPost('currentstatus');
            }

            $data = [
                'servicecost' => $serviceCost,
                'homeservicecost' => $homeServiceCost,
                'imagename' =>$imageName,
                'status' => $status,
            ];
            
            if($serviceModel->update($serviceID, $data) == true)
            {

                $result = $serviceModel->getService($serviceID);

                echo view('templates/admin/header');
                $message = ["Service details has been updated"];
                return view('admin/viewservice', ['servicelist' => $result, 'message' => $message]);
            }
            else
            {
                echo view('templates/admin/header');
                $result = $serviceModel->getService($serviceID);
                return view('admin/viewservice', ['servicelist' => $result]);
            }
    
        }
        else
        {
            echo $viewService($serviceID);
        }
    }
}
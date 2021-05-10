<?php

namespace App\Controllers;

use App\Models\StatisticsModel;
use App\Models\AccountModel;
use App\Models\AppointmentModel;
use App\Models\VerificationModel;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
class Account extends Controller
{
    public function index()
    {
        echo view('signup/createaccount');
    }

    public function usersignup()
    {
        $accountModel = new AccountModel();
        $verificationModel = new VerificationModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
                'emailaddress' => 'required',
                'username' => 'required',
                'password'  => 'required',
                'passwordconfirm' => 'required',
                'contactnumber'  => 'required'
            ]))
        {
            $data = [
                'emailaddress' => $this->request->getPost('emailaddress'),
                'username'  => $this->request->getPost('username'), 
                'password'  => $this->request->getPost('password'),
                'contactnumber'  => $this->request->getPost('contactnumber'),
                'passwordconfirm'  => $this->request->getPost('passwordconfirm'),
                'status' => 'INACTIVE'
            ];

            if($accountModel->save($data) === false)
            {
                return view('signup/createaccount', ['errors' => $accountModel->errors()]);
            }
            else
            {
                helper('text');

                $emailaddress = $this->request->getPost('emailaddress');
                $verificationCode = random_string('alnum', 16);
                $email = \Config\Services::email();

                $email->setFrom('sly_steroid@yahoo.com', 'Brusko Management');
                $email->setTo($emailaddress);
                $email->setSubject('Account Verification');
                $email->setMessage('Here is your code: '. $verificationCode);
                
                $verificationData = [
                    'emailaddress' => $emailaddress,
                    'code'  =>  $verificationCode, 
                ];

                
                if($verificationModel->save($verificationData))
                {
                    if($email->send())
                    {   
                        $result = $accountModel->checkAccount($emailaddress,  $this->request->getPost('password'));
                        if(isset($result))
                        {
                            $newdata = [
                                'accountid' => $result->id,
                                'username'  => $result->username,
                                'email'     => $emailaddress,
                            ];
                            
                            $session = \Config\Services::session();
                            $session->set($newdata);
                        }

                        $message = ["A verification code has been sent to your email address! Please enter the code below to verify your account"];
                        return view('signup/verifyaccount', ['info' => $message]);   
                    }
                    else
                    {
                        $data = $email->printDebugger(['header']);
                        return view('signup/createaccount', ['errors' => $data]);   
                    }
                }

                echo view('signup/verifyaccount');
            }
        }
        else
        {
            echo view('signup/createaccount');
        }
    }

    public function userlogin()
    {
        $time = new Time('now');

        $accountModel = new AccountModel();
        $appointmentModel = new AppointmentModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
                'emailaddress' => 'required',
                'password'  => 'required',
            ]))
        {

            $emailaddress = $this->request->getPost('emailaddress');
            $password = $this->request->getPost('password');

            // Checking account if it exists.
            $result = $accountModel->checkAccount($emailaddress, $password);
            
            if(isset($result))
            {
                if($result->status == "ACTIVE")
                {
                    $newdata = [
                        'accountid' => $result->id,
                        'username'  => $result->username,
                        'email'     => $emailaddress,
                        'logged_in' => TRUE
                    ];
                
                    $session = \Config\Services::session();
                    $session->set($newdata);

                    if(!strcmp($session->get('username'), "admin"))
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
                            }
                        }
                
                        $totalNetEarnings = $result->servicecost * .70; // 30 percent cut for employees
                
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
                        ];
                
                        echo view('templates/admin/header');
                        return view('admin/dashboard', ['statistics' => $dashboardStatistics, 'earningspermonth' => $result5]);
                    }
                    else
                    {
                        $accountid = $session->get('accountid');

                        $result = $appointmentModel->retrieveAppointment($accountid);

                        echo view('templates/user/header');
                        return view('user/viewappointment', ['appointmentlist' => $result]);
                    }
                }
                else
                {
                    $message = ["Account is INACTIVE!"];
                    return view('login/loginaccount', ['errors' => $message]);
                }
            }
            else
            {
                $message = ["Email address and password does not match!"];
                return view('login/loginaccount', ['errors' => $message]);
            }
        }
        else
        {
            echo view('login/loginaccount');     
        }
    }

    
    public function userlogout()
    {
        $session = \Config\Services::session();
        $session->destroy();

        echo view('login/loginaccount');  
    }


    public function forgotpassword()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'emailaddress' => 'required',
        ]))
        {
            $model = new AccountModel();
            $emailaddress = $this->request->getPost('emailaddress');
            $password = "";
            // Checking account if it exists.
            $result = $model->checkAccount($emailaddress, $password);
            if(isset($result))
            {
                $useremailadress = $this->request->getPost('emailaddress');
                $email = \Config\Services::email();

                $email->setFrom('sly_steroid@yahoo.com', 'Brusko Management');
                $email->setTo($useremailadress);

                $accountModel = new AccountModel();

                $result = $accountModel->getPasswordUsingEmail($emailaddress);

                $email->setSubject('Forgot Password');
                $email->setMessage('Here is your password: '. $result->password . '<br>'. 'Please login again using your new password '. base_url());

                if($email->send())
                {   
                    $message = ["The password has been sent to your email address! Please login again using the password we sent you"];
                    return view('login/loginaccount', ['info' => $message]);   
                }
                else
                {
                    $data = ["Unable to send email"];
               
                    return view('login/loginaccount', ['errors' => $data]);   
                }
            }
            else
            {
                $message = ["Account does not exist!"];
                return view('login/forgotpassword', ['errors' => $message]);   
            }
        }
        else
        {
            echo view('login/forgotpassword');     
        }
    }

    public function viewaccount($accountid)
    {
        $model = new AccountModel();

        $result = $model->getAccount($accountid);

        $session = \Config\Services::session();
        $emailaddress = $session->get('email');

        if(!strcmp($emailaddress, "admin@mail.com"))
        {
            echo view('templates/admin/header'); 
            return view('profile/adminview', ['accountlist' => $result]);   
        }
        else
        {
            echo view('templates/user/header');
            return view('profile/userprofile', ['accountlist' => $result]);    
        }
    }

    public function verifyaccount()
    {
        $session = \Config\Services::session();

        $accountModel = new AccountModel();
        $verificationModel = new VerificationModel();
        $appointmentModel = new AppointmentModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
                'verificationcode' => 'required',
            ]))
        {
            $emailaddress = $session->get('email');
            $verificationCode = $this->request->getPost('verificationcode');

            // verify account using code sent from email
            $verificationResult = $verificationModel->verifyaccount($emailaddress, $verificationCode);
            
            if(isset($verificationResult))
            {
                $accountid = $session->get('accountid');

                // get all appointments
                $result = $appointmentModel->retrieveAppointment($accountid);

                // set session data log in status to TRUE
                $newdata = [
                    'logged_in' => TRUE
                ];

                // activate account
                $accountModel->updateaccountstatus($accountid, "ACTIVE");

                $session->set($newdata);

                echo view('templates/user/header');
                return view('user/viewappointment', ['appointmentlist' => $result]);
            }
            else
            {
                $message = ["Incorrect verification code"];
                return view('signup/verifyaccount', ['errors' => $message]);   
            }
        }

        echo view('signup/verifyaccount');
    }


    public function changepassword()
    {
        $accountModel = new AccountModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'password'  => 'required',
            'passwordconfirm' => 'required',
        ]))
        {
            $session = \Config\Services::session();
            $accountid = $session->get('accountid');

            $data = [
                'password'  => $this->request->getPost('password'),
                'passwordconfirm'  => $this->request->getPost('passwordconfirm'),
            ];
            
            if($accountModel->update($accountid, $data) == true)
            {
                echo view('templates/user/header');
                $message = ["Password has been updated"];
                return view('user/changepassword', ['message' =>  $message]);
            }
            else
            {
                echo view('templates/user/header');
                return view('user/changepassword', ['message' => $accountModel->errors()]);
            }
        }
        else
        {
            echo view('templates/user/header');
            echo view('user/changepassword');
        }
    }
}
?>
<?php

namespace App\Controllers;

use App\Models\StatisticsModel;
use App\Models\AccountModel;
use App\Models\AppointmentModel;
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
        $model = new AccountModel();

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
                'status' => 'ACTIVE'
            ];

            if($model->save($data) === false)
            {
                return view('signup/createaccount', ['errors' => $model->errors()]);
            }
            else
            {
                $model->save($data);
                echo view('signup/success');
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

                    $model = new StatisticsModel();

                    $result = $model->getTotalMonthlyEarnings();

                    echo view('templates/admin/header');
                    echo view('admin/dashboard');
                    echo view('templates/admin/footer');
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


    public function resetpassword()
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

                $email->setSubject('Reset Password');
                $email->setMessage('Here is your new password');

                $email->send();

                $message = ["The password has been sent to your email address! Please login again using the password we sent you"];
                return view('login/loginaccount', ['errors' => $message]);   
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
}

?>
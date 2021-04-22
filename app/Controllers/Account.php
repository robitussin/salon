<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Controller;

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
                'passwordconfirm'  => $this->request->getPost('passwordconfirm')
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

        $model = new AccountModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
                'emailaddress' => 'required',
                'password'  => 'required',
            ]))
        {

            $emailaddress = $this->request->getPost('emailaddress');
            $password = $this->request->getPost('password');

            // Checking account if it exists.
            $result = $model->checkAccount($emailaddress, $password);
            if(isset($result))
            {
                $session = \Config\Services::session();

                $newdata = [
                    'accountid' => $result->id,
                    'username'  => $result->username,
                    'email'     => $emailaddress,
                    'logged_in' => TRUE
                ];
            
                $session->set($newdata);

                echo view('templates/admin/header');
                echo view('admin/dashboard');
                echo view('templates/admin/footer');
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
            echo "def";
            echo view('login/forgotpassword');     
        }
    }
}

?>
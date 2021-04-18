<?php

namespace App\Controllers;

use App\Models\AccountModel;
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
                'contactnumber'  => 'required',
            ]))
        {
            echo "sky";
            $model->save([
                'emailaddress' => $this->request->getPost('emailaddress'),
                'username'  => $this->request->getPost('username'), 
                'password'  => $this->request->getPost('password'),
                'contactnumber'  => $this->request->getPost('contactnumber'),
            ]);

            echo view('signup/success');

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
            echo view('admin/dashboard');

        }
        else
        {
            echo view('login/loginaccount');     
        }
    }
}

?>
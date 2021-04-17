<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Controller;

class Account extends Controller
{
    public function index()
    {
        //
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
            echo view('templates/header', ['title' => 'Sign up today!']);
            echo view('signup/createaccount');
            echo view('templates/footer');
            
        }
    }

    public function userlogin()
    {
      
        $model = new AccountModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
                'emailaddress' => 'required',
                'username' => 'required',
                'password'  => 'required',
                'contactnumber'  => 'required',
            ]))
        {
            echo view('login/success');

        }
        else
        {
            echo view('templates/header', ['title' => 'Sign up today!']);
            echo view('login/loginaccount');
            echo view('templates/footer');
            
        }
    }
}

?>
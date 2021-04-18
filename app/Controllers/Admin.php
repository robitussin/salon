<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        echo base_url();
        echo view('templates/admin/header');
        echo view('admin/dashboard');
        echo view('templates/admin/footer');
    }

    public function createappointment()
    {
        echo view('templates/admin/header');
        echo view('admin/createappointment');
        echo view('templates/admin/footer');
    }

    public function viewappointment()
    {
        echo view('templates/admin/header');
        echo view('admin/viewappointment');
        echo view('templates/admin/footer');
    }

    public function dashboard()
    {
        echo view('templates/admin/header');
        echo view('admin/dashboard');
        echo view('templates/admin/footer');
    }

    public function test()
    {
        echo view('admin/test');
    }
}
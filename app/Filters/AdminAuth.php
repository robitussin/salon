<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('logged_in'))
        {
            if(strcmp(session()->get('email'), "admin@mail.com"))
            {
                return redirect()->to(previous_url());
            }
        }
        else
        {
            return redirect()->to('/');
        }

        // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
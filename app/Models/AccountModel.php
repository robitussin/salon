<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';

    protected $primarykey = 'id';

    protected $allowedFields = ['emailaddress', 'username', 'password', 'contactnumber'];

    protected $validationRules = [
        'username'  => 'required', 
        'emailaddress' => 'required|valid_email|is_unique[accounts.emailaddress]',
        'password'  => 'required',
        'contactnumber' => 'required',
        'passwordconfirm' => 'required_with[password]|matches[password]'
    ];

    protected $validationMessages = [
        'emailaddress'  => [
            'is_unique' => '*Sorry. That email has already been taken. Please choose another.'
        ],
        'passwordconfirm'   => [
            'matches' => '*The repeat password does not match the password.'
        ]
    ];

    public function checkAccount($emailaddress, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('accounts');
        if(strlen($password))
        {
            $builder->select('emailaddress, password');
            $builder->where('emailaddress', $emailaddress);
            $builder->where('password', $password);
        }
        else
        {
            $builder->select('emailaddress');
            $builder->where('emailaddress', $emailaddress);
        }

        $query = $builder->get();
        return $query->getRow();
    }
}
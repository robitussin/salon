<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';

    protected $primarykey = 'id';

    protected $allowedFields = ['emailaddress', 'username', 'password', 'contactnumber', 'status'];

    protected $validationRules = [
        'username'  => 'required|alpha_space', 
        'emailaddress' => 'required|valid_email|is_unique[accounts.emailaddress]',
        'password'  => 'required|alpha_numeric_punct',
        'contactnumber' => 'required|numeric',
        'passwordconfirm' => 'required_with[password]|matches[password]'
    ];

    protected $validationMessages = [
        'emailaddress'  => [
            'is_unique' => '*Sorry. That email has already been taken. Please choose another.'
        ],
        'passwordconfirm'   => [
            'matches' => '*The repeat password does not match the password.'
        ],
        'username'   => [
            'alpha_space' => 'Alphabetical characters and spaces are only allowed for usernames'
        ],
        'password'   => [
            'alpha_numeric_punct' => 'Alphanumeric characters, spaces , ~ (tilde),
            ! (exclamation), # (number), $ (dollar),
            % (percent), & (ampersand), * (asterisk),
            - (dash), _ (underscore), + (plus),
            = (equals), | (vertical bar), : (colon),
            . (period) are only allowed for passwords'
        ],
        'contactnumber'   => [
            'numeric' => 'Numeric characters are only allowed for Contact numbers'
        ],
    ];

    public function checkAccount($emailaddress, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('accounts');
        if(strlen($password))
        {
            $builder->select('id, emailaddress, username, password, status');
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

    public function getAccount($accountID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('accounts');

        if(strlen($accountID))
        {
            $builder->select('id, emailaddress, username, password, contactnumber, status');
            $builder->where('id', $accountID);
            $query = $builder->get(); 
            return $query->getRow();
        }
        else
        {
            $query = $builder->get(); 
            return $query->getResult();
        }
    }

    public function updateAccount($accountid,$username,$contactnumber)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('accounts');

        $data = [
            'username' => $username,
            'contactnumber' => $contactnumber,
        ];

        $builder->where('id', $accountid);
        $builder->update($data);
    }

    public function updateaccountstatus($account, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('accounts');

        $data = [
            'status' => $status,
        ];

        $builder->where('id', $account);
        $builder->update($data);
    }

    
    public function getPasswordUsingEmail($emailaddress)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('accounts');

        $builder->select('password');
        $builder->where('emailaddress', $emailaddress);
        $query = $builder->get(); 
        return $query->getRow();
    }
    

    public function verifyaccount($emailaddress, $code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('verify');
        
        $builder->where('emailaddress', $emailaddress);
        $builder->where('code', $code);
        $query = $builder->get(); 
        return $query->getRow();
    }
}
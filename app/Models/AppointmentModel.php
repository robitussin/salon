<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'services';

    protected $primarykey = 'id';

   // protected $db = \Config\Database::connect();

    //protected $builder = $db->table('services');

    /*
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
    */

    public function retrieveServices()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('services');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertAppointment($dateandtime, $servicename, $accountid)
    {
        echo $dateandtime;
        echo "</br>";
        echo $servicename;
        echo "</br>";
        echo $accountid;
        echo "</br>";

        $data = [
            'accountid' => $accountid,
            'servicename'  => $servicename,
            'datetime' => $dateandtime
        ];
        
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');
        $query = $builder->insert($data);        
    }
}
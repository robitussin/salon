<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    public function retrieveServices()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('services');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertAppointment($dateandtime, $servicename, $accountid)
    {
        $data = [
            'accountid' => $accountid,
            'servicename'  => $servicename,
            'datetime' => $dateandtime,
            'status' => 'PENDING'
        ];
        
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');
        $query = $builder->insert($data);        
    }

    public function retrieveAppointment($accountid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $session = \Config\Services::session();

        $username = $session->get('email');

        if(!strcmp($username, "admin@mail.com"))
        {
            $query = $builder->get();
        }
        else
        {
            $builder->select('servicename, datetime, status');
            $builder->where('accountid', $accountid);
            $query = $builder->get();
        }
        
        return $query->getResult();
    }

    public function retrieveAppointmentbyappointmentid($appointmentid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->select('id, accountid, servicename, datetime, status');
        $builder->where('id', $appointmentid);
        $query = $builder->get();
        
        return $query->getRow();
    }

    
    public function updateappointmentstatus($appointmentid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');
;
        $data = [
            'status' => 'CANCELLED',
        ];

        $builder->where('id', $appointmentid);
        $builder->update($data);
    }
}
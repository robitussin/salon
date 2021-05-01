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

    public function insertAppointment($dateandtime, $service, $accountid)
    {
        list($servicename, $serviceid) = explode("-", $service);

        $data = [
            'accountid' => $accountid,
            'servicename'  => $servicename,
            'serviceid' => $serviceid, 
            'datetime' => $dateandtime,
            'status' => 'PENDING',
            'employeeid' => '0',
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

    
    public function updateappointmentstatus($appointmentid, $appointmentstatus, $employeeid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');
;
        $data = [
            'status' => $appointmentstatus,
            'employeeid' =>  $employeeid,
        ];

        $builder->where('id', $appointmentid);
        $builder->update($data);
    }

    public function countAppointment($id, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->selectCount('id');
        $builder->where('employeeid', $id);

        if(isset($status))
        {
            $builder->where('status', $status);
        }
        
        $query = $builder->get();
        return $query->getRow();
    }
}
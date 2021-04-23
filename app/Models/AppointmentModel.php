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

        if(!strcmp($accountid, "admin"))
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
}
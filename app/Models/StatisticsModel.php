<?php

namespace App\Models;

use CodeIgniter\Model;

class StatisticsModel extends Model
{
    public function getTotalEarnings()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->selectSum('services.servicecost');
        $builder->join('services', 'services.id = appointment.serviceid');
        $builder->where('appointment.status', 'COMPLETE');
        $query = $builder->get();
        return $query->getRow();   
    }

    public function getTotalAppointments($status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->selectCount('id');

        if(strlen($status))
        {
            $builder->where('status', $status);
        }

        $query = $builder->get();
        return $query->getRow();
    }

    public function getTotalEarningsPerMonth($status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->select('SUM(services.servicecost) as monthlyearnings, MONTHNAME(datetime) as month');
        $builder->join('services', 'services.id = appointment.serviceid');
        $builder->where('appointment.status', $status);
        $builder->where('appointment.datetime >=', '2021-01-01 00:00:00');
        $builder->where('appointment.datetime <=', '2021-12-31 11:59:59');
        $builder->groupBy('MONTHNAME(datetime)');
        $builder->orderBy('MONTHNAME(datetime)', 'DESC');
        $query = $builder->get();
    
        return $query->getResult();   
    }

    public function getRevenueSource($status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->select('COUNT(services.servicename) as sourcecount, appointment.servicename as sourcename');
        $builder->join('services', 'services.id = appointment.serviceid');
        $builder->where('appointment.status', $status);
        $builder->groupBy('appointment.servicename');
        $query = $builder->get();
        return $query->getResult();   
    }
}
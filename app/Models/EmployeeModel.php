<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    public function getEmployee($employeeID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');

        if(strlen($employeeID))
        {
            $builder->select('id, name, position');
            $builder->where('id', $employeeID);
            $query = $builder->get(); 
            return $query->getRow();
        }
        else
        {
            $query = $builder->get(); 
            return $query->getResult();
        }
    }

    public function getTotalEmployeeEarnings($employeeID, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointment');

        $builder->selectSum('services.servicecost');
        $builder->join('services', 'services.id = appointment.serviceid');
        $builder->where('appointment.employeeid', $employeeID);
        $builder->where('appointment.status', $status);
        $query = $builder->get();
    
        return $query->getRow();   
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';

    protected $allowedFields = ['servicename', 'servicecost', 'description', 'imagename', 'status'];

    public function getService($serviceID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('services');

        if(strlen($serviceID))
        {
            $builder->select('id, servicename, servicecost, description, imagename, status');
            $builder->where('id', $serviceID);
            $query = $builder->get(); 
            return $query->getRow();
        }
        else
        {
            $query = $builder->get(); 
            return $query->getResult();
        }
    }

}
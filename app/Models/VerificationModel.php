<?php

namespace App\Models;

use CodeIgniter\Model;

class VerificationModel extends Model
{
    protected $table = 'verify';

    protected $allowedFields = ['emailaddress', 'code'];

    public function verifyaccount($emailaddress, $verificationCode)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('verify');
        
        $builder->where('emailaddress', $emailaddress);
        $builder->where('code', $verificationCode);
        $query = $builder->get(); 
        return $query->getRow();
    }
}
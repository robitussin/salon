<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';

    protected $allowedFields = ['emailaddress', 'username', 'password', 'contactnumber'];
}
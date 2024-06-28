<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'fname', 'lname', 'position', 'department', 'salary',
        'birthdate', 'email', 'phone', 'address', 'zipcode', 'photo'
    ];
    protected $useTimestamps = true;
}

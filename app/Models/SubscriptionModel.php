<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model
{
    protected $table      = 'tbl_subscribers';
    protected $primaryKey = 'sub_id';
    protected $allowedFields = ['email', 'rec_date'];
 
}
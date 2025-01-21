<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleInquiryModel extends Model
{
    protected $table      = 'tbl_inquiries';
    protected $primaryKey = 'inquiry_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'email', 'phone', 'message', 'veh_id', 'created_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
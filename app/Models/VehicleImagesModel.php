<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleImagesModel extends Model
{
    protected $table      = 'tb_vehicle_pictures';
    protected $primaryKey = 'pic_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['veh_id', 'pic_url', 'pic_priority', 'web_show'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
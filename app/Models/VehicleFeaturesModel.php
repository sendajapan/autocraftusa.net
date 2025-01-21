<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleFeaturesModel extends Model
{
    protected $table      = 'tb_vehicle_attributes';
    protected $primaryKey = 'veh_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['veh_id', 'AC', 'POWER_STEERING', 'ABS', 'POWER_WINDOWS', 'SRS', 'REAR_SPOILER', 'ROOF_RAIL', 'CD', 'TV', 'NAVIGATION', 'ALLOY_WHEEL', 'LEATHER_SEATS', 'BACKTYRE', 'RADIO', 'CENTRAL_LOCKING', 'POWER_MIRROR', 'BACK_CAMERA', 'FRONT_CAMERA', 'SUN_ROOF', 'DVD_Player', 'MD_Player', 'FOG_Lights', 'Body_Kit', 'Turbo', 'One_Owner', 'HID', 'POWER_SLIDE_DOOR', 'CORNER_SENSOR', 'STEERING_SWITCH', 'AUTO_AC', 'half_leather_seat', 'seven_seater', 'push_start', 'paddle_shift', 'double_power_slide_door'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
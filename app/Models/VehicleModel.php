<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table      = 'tbl_vehicles';
    protected $primaryKey = 'veh_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['veh_id', 'stock_no', 'model_code', 'chassis', 'engine_no', 'engine_type', 'body_type', 'make', 'model', 'fuel', 'traction', 'drive', 'veh_condition', 'year', 'month', 'doors', 'seats', 'cc', 'mileage', 'transmission', 'gross_weight', 'net_weight', 'length', 'width', 'height', 'm3', 'model_grade', 'exterior_color', 'interior_color', 'remarks', 'fob_price', 'status', 'is_special', 'description', 'display_website', 'youtube_video_link', 'featured_image', 'added_by', 'updated_on', 'inquiries', 'cust_id', 'cust_name', 'clearance_sale', 'clearance_price'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
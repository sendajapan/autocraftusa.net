<?php
namespace App\Models;
use CodeIgniter\Model;
class VehicleModels extends Model
{
    protected $table      = 'tbl_vehicle_model';
    protected $primaryKey = 'model_id';
    protected $allowedFields = ['model_name','make_id','created_by'];    
}
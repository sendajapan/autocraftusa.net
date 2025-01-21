<?php
namespace App\Models;
use CodeIgniter\Model;
class VehicleMakeModel extends Model
{
    protected $table      = 'tbl_vehicle_make';
    protected $primaryKey = 'make_id';
    protected $allowedFields = ['make_name'];    
}
<?php
namespace App\Models;
use CodeIgniter\Model;
class ColorTypeModel extends Model
{
    protected $table      = 'tbl_color_type';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['Name','avis_color','color_code','inverse_color'];    
}
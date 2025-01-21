<?php
namespace App\Models;
use CodeIgniter\Model;
class BodyStyleModel extends Model
{
    protected $table      = 'tbl_body_style';
    protected $primaryKey = 'BodyStyleID1';
    protected $allowedFields = ['BodyStyleID1Name','avis_body_type'];    
}
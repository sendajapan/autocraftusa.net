<?php
namespace App\Models;
use CodeIgniter\Model;
class InquiriesModel extends Model
{
    protected $table      = 'tbl_inquiries';
    protected $primaryKey = 'inquiry_id';
    // protected $allowedFields = ['country_name'];    
}
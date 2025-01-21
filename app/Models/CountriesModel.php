<?php
namespace App\Models;
use CodeIgniter\Model;
class CountriesModel extends Model
{
    protected $table      = 'tbl_countries';
    protected $primaryKey = 'country_id';
    protected $allowedFields = ['country_name'];    
}
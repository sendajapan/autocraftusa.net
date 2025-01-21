<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table      = 'tbl_contact_messages';
    protected $primaryKey = 'message_id';
    protected $allowedFields = ['name','email','telephone','message','message_date'];

    
}
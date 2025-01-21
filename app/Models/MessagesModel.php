<?php
namespace App\Models;
use CodeIgniter\Model;
class MessagesModel extends Model
{
    protected $table      = 'tbl_contact_messages';
    protected $primaryKey = 'message_id';
    // protected $allowedFields = [];    
}
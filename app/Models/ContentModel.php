<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table      = 'tbl_content';
    protected $primaryKey = 'content_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['content_id', 'route', 'criteria', 'content', 'meta_title', 'meta_description', 'meta_h1', 'noindex', 'visibility', 'created_date', 'added_by', 'updated_date', 'updated_by'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
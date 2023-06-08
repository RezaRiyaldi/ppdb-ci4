<?php

namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'forms';
    protected $primaryKey       = 'form_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'form_status_id',
        'form_fullname',
        'form_no_register',
        'form_gender',
        'form_tanggal_lahir',
        'form_ktp',
        'form_telp',
        'form_alamat',
        'created_at',
        'updated_at',
        'user_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}

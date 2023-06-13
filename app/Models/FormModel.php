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
        'form_no_register',
        'no_induk_siswa',

        // Biodata
        'form_fullname',
        'form_callname',
        'form_agama',
        'form_gender', // L, P
        'form_tempat_lahir',
        'form_tanggal_lahir',
        'form_alamat',
        'form_jenis_alamat', // ortu, numpang, asrama

        // Orang Tua
        'form_wali',
        'form_orang_tua',
        'form_pendidikan_orang_tua',
        'form_pekerjaan_jabatan',
        'form_hubungan_anak',
        'form_telp',

        // Asal Usul
        'form_as', // baru, pindahan
        'form_from', // rt, tk
        'form_asal_sekolah',
        'form_tanggal_pindah',
        'form_dari_kelas',
        
        // TK
        'form_tk',
        'form_tahun_tk',
        'form_lama_tk',

        // Nothing
        'created_at',
        'updated_at',
        'accepted_at',
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

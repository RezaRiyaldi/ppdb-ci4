<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FormModel;

class GuestController extends BaseController
{    
    protected $form;

    public function __construct()
    {
        $this->form = new FormModel();
    }

    public function index()
    {
        $list_siswa_diterima = $this->form
            ->join('form_status fs', 'fs.form_status_id = forms.form_status_id')
            ->where('fs.form_status_id', 2)
            ->orderBy('forms.no_induk_siswa', 'asc')
            ->findAll();
        $data['title'] = "Home";
        $data['list_siswa'] = $list_siswa_diterima;

        return view('guest/home', $data);
    }

}

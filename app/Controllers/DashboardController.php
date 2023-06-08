<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FormModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    protected $form;
    protected $user;
    protected $role;

    public function __construct() {
        $this->form = new FormModel();
        $this->user = new UserModel();
        $this->role = new RoleModel();
    }

    public function index()
    {        
        $user = session()->get('user');

        $page = "home_siswa";
        if ($user->role_id == 1) {
            $page = "home_admin";


        } else {
            $data['form'] = $this->form->where('user_id', $user->user_id)
                ->join('form_status fs', 'fs.form_status_id = forms.form_status_id')
                ->first();
        }
        
        $data['title'] = "Home";
        return view('dashboard/' . $page, $data);

    }

    public function users_management()
    {
        $data['title'] = "Users Management";
        $data['users'] = $this->user->findAll();
        $data['roles'] = $this->role->findAll();

        return view('dashboard/users_management', $data);
    }

    public function user_add()
    {
        $input = $this->request->getPost();
        $input['fullname'] = ucwords(strtolower($input['fullname']));
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);

        
        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|is_unique[users.username]',
        ];

        $messages = [
            'username' => [
                'is_unique' => 'Username telah terdaftar'
            ],
            'email' => [
                'is_unique' => 'Email sudah terdaftar',
                'valid_email' => 'Please enter a valid email address.'
            ],
        ];

        $validate = \Config\Services::validation();
        if (!$validate->setRules($rules, $messages)->run($input)) {
            session()->setFlashdata('errors', $validate->getErrors());
            return redirect()->back()->withInput($input);
        }

        $insertUser = $this->user->insert([
            'username' => $input['username'],
            'password' => $input['password'],
            'fullname' => $input['fullname'],
            'email' => $input['email'],
            'role_id' => $input['role'],
        ]);
        
        if ($insertUser) {
            return redirect()->route('users')->with('success', "Berhasil menambahkan user");
        }

        return redirect()->route('users')->with('errors', "Gagal menambahkan user");
    }

    public function user_delete($id)
    {
        $type = "";
        $message = "";

        $getUser = $this->user->find($id);
        $getForm = $this->form->where('user_id', $id)->first();

        if ($getForm != NULL) {
            $this->form->where('user_id', $id)->delete();
        }
        
        if ($getUser != NULL) {
            $this->user->where('user_id', $id)->delete();
            $type = "success";
            $message = "Berhasil hapus user";
        } else {
            $type = "errors";
            $message = "Gagal hapus user";
        }

        
        return redirect()->route('users')->with($type, $message);
    }
}

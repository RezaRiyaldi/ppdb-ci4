<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FormModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $user;
    protected $form;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->form = new FormModel();
    }

    public function login()
    {
        $data['title'] = "Login";

        return view('guest/login', $data);
    }

    public function actionLogin($data = [])
    {
        $input = $data;
        if (count($data) == 0) {
            $input = $this->request->getPost();
        }

        $user = $this->user->where('email', $input['username'])
            ->orWhere('username', $input['username'])
            ->join('roles r', 'r.role_id = users.role_id')
            ->first();

        if ($user) {
            if (!$user->is_banned) {
                if (password_verify($input['password'], $user->password)) {
                    // Resfresh Banned
                    $this->user->update($user->id, ['counter_login' => 0]);

                    session()->set('user', $user);
                    return redirect('dashboard');
                }
            }
        } else {
            return redirect('login')->with('errors', 'Akun tidak ditemukan');
        }

        $checkBanned = $this->checkBanned($user);

        if ($checkBanned['is_banned']) {
            return redirect('login')->with('errors', $checkBanned['message']);
        }

        return redirect('login')->withInput()->with('errors', $checkBanned['message']);
    }

    private function checkBanned($user)
    {
        $response = [];
        $response['message'] = 'Password salah';
        $response['is_banned'] = 0;
        $counter_login = $user->counter_login + 1;

        if ($user->is_banned || $counter_login >= 3) {
            $response['is_banned'] = 1;
            $response['message'] = "Akun anda telah diblokir, harap hubungi admin sekolah.";
            $is_banned = 1;
        } else {
            $is_banned = 0;
        }

        $data_banned = [
            'counter_login' => $counter_login,
            'is_banned' => $is_banned
        ];

        if ($user->role_id == 2) {
            $this->user->update($user->id, $data_banned);
        }

        return $response;
    }


    public function register()
    {
        $data['title'] = "Pendaftaran";

        return view('guest/register', $data);
    }

    public function actionRegister()
    {
        $input = $this->request->getPost();

        $input['name'] = ucwords(strtolower($input['name']));
        $input['newpassword'] = password_hash($input['password'], PASSWORD_DEFAULT);
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

        $userId = $this->user->insert([
            'username' => $input['username'],
            'password' => $input['newpassword'],
            'fullname' => $input['name'],
            'email' => $input['email'],
            'role_id' => 2,
        ]);

        $formId = $this->form->insert([
            'form_status_id' => 1,
            'form_no_register' => $this->createNumberRegistration(),
            'form_fullname' => $input['name'],
            'form_tanggal_lahir' => $input['tanggal_lahir'],
            'form_gender' => $input['jenis_kelamin'],
            'form_telp' => $input['telp'],
            'form_alamat' => $input['alamat'],
            'user_id' => $userId
        ]);

        $this->actionLogin($input);
        return redirect('dashboard');
    }

    private function createNumberRegistration()
    {
        $lastForm = $this->form->select('form_no_register')->orderBy('form_id', 'DESC')->first();
        if ($lastForm) {
            $lastCode = $lastForm->form_no_register;
            $lastNumber = substr($lastCode, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $currentMonth = date('m');

        $month = [
            '01' => 'J1',
            '02' => 'F2',
            '03' => 'M3',
            '04' => 'A4',
            '05' => 'M5',
            '06' => 'J6',
            '07' => 'J7',
            '08' => 'A8',
            '09' => 'S9',
            '10' => 'O0',
            '11' => 'N1',
            '12' => 'D2',
        ];

        // $firstLetter = $month[$currentMonth];
        $firstLetter = "NR";
        $newNoReg = $firstLetter . date('Y') . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return $newNoReg;
    }

    public function actionLogout()
    {
        session()->destroy();
        return redirect('login')->with('success', "Berhasil logout, semoga harimu senin terus!");
    }
}

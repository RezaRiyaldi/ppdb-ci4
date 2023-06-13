<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FormModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DashboardController extends BaseController
{
    protected $form;
    protected $user;
    protected $role;

    public function __construct()
    {
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
            $data['jumlah_user'] = $this->user->countAllResults();
            $data['jumlah_admin'] = $this->user->where('role_id', 1)->countAllResults();
            $data['jumlah_pendaftar'] = $this->user->where('role_id', 2)->countAllResults();
            $data['jumlah_siswa'] = $this->user->join('forms f', 'f.user_id = users.user_id')
                ->where('f.form_status_id', 2)
                ->where('role_id', 2)->countAllResults();
            $data['form_unverif'] = $this->form->where('form_status_id', 1)->countAllResults();
            $data['form_verif'] = $this->form->where('form_status_id', 2)->countAllResults();
        } else {
            $data['form'] = $this->form->where('user_id', $user->user_id)
                ->join('form_status fs', 'fs.form_status_id = forms.form_status_id')
                ->first();
            $data['orangtua'] = json_decode($data['form']->form_orang_tua);
            $data['pekerjaan_jabatan'] = json_decode($data['form']->form_pekerjaan_jabatan);
        }

        $data['title'] = "Home";
        return view('dashboard/' . $page, $data);
    }

    public function users_management()
    {
        $data['title'] = "Users Management";
        $data['users'] = $this->user->findAll();
        $data['roles'] = $this->role->findAll();
        $data['get'] = $this->request->getGet();

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
            'role_id' => 1,
        ]);

        if ($insertUser) {
            return redirect()->route('users')->with('success', "Berhasil menambahkan user");
        }

        return redirect()->route('users')->with('errors', "Gagal menambahkan user");
    }

    public function user_edit($id)
    {
        $getUser = $this->user->find($id);
        if ($getUser) {
            $data['title'] = "Edit User";
            $data['user'] = $getUser;
            $data['roles'] = $this->role->findAll();

            return view('dashboard/user_edit', $data);
        }

        return redirect('users')->with("errors", "User tidak ditemukan!");
    }

    public function actionUserEdit($id)
    {
        $type = "errors";
        $message = "Something went wrong!";

        $data = [];
        $input = $this->request->getPost();

        if ($input['password'] != "") {
            $data['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        }

        $data['username'] = $input['username'];
        $data['fullname'] = $input['fullname'];
        $data['email'] = $input['email'];
        $data['role_id'] = $input['role'];

        $userEdit = $this->user->update($id, $data);

        if ($userEdit) {
            $type = "success";
            $message = "Berhasil update akun user";
        }

        return redirect()->back()->with($type, $message);
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

        $tab = "";
        if (isset($this->request->getGet()['tab'])) {
            $tab = $this->request->getGet()['tab'];
        }
        return redirect()->to('/users?tab=' . $tab)->with($type, $message);
    }

    public function forms_management()
    {
        $data['title'] = "Formulir Siswa";
        $data['get'] = $this->request->getGet();
        $data['forms'] = $this->form->join('form_status fs', 'fs.form_status_id = forms.form_status_id')->findAll();

        return view('dashboard/forms_management', $data);
    }

    public function form_detail($id)
    {
        $data['title'] = "Detail Formulir";
        $data['form'] = $form = $this->form->where('user_id', $id)->first();
        $data['orangtua'] = json_decode($form->form_orang_tua);
        $data['pekerjaan_jabatan'] = json_decode($form->form_pekerjaan_jabatan);

        return view('dashboard/form_detail', $data);
    }

    public function form_acc($id)
    {
        $type = "errors";
        $message = "Something went wrong!";

        $getForm = $this->form->where('user_id', $id)->first();
        if ($getForm) {
            $update = $this->form->update($getForm->form_id, [
                'form_status_id' => 2,
                'no_induk_siswa' => $this->create_nis(),
                'accepted_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {
                $type = "success";
                $message = "Berhasil menyetujui form atas nama " . $getForm->form_fullname;
            }
        } else {
            $message = "Form tidak ditemukan!";
        }
        return redirect()->route('forms')->with($type, $message);
    }

    public function create_nis()
    {
        $tanggal_masuk = date('y');
        $npsn = 18141; // 5 Digit dari 20218141

        $last_nis = $this->form->select('no_induk_siswa')->orderBy('no_induk_siswa', 'DESC')->first();
        if ($last_nis) {
            $last_number = substr($last_nis->no_induk_siswa, -3);
            $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $new_number = '001';
        }

        $new_nis = $tanggal_masuk . $npsn . $new_number;

        return $new_nis;
    }

    public function form_edit($id)
    {
        $type = "errors";
        $message = "Something went wrong!";
        $input = $this->request->getPost();

        if ($input['form_as'] == "pindahan" || $input['form_from'] == "rt") {
            $input['form_tk'] = NULL;
            $input['form_tahun_tk'] = NULL;
            $input['form_lama_tk'] = NULL;
        } else if ($input['form_as'] == "baru") {
            $input['form_asal_sekolah'] = NULL;
            $input['form_tanggal_pindah'] = NULL;
            $input['form_dari_kelas'] = NULL;
        }

        $data = [
            'form_fullname' => ucwords(strtolower($input['fullname'])),
            'form_callname' => ucwords(strtolower($input['callname'])),
            'form_agama' => $input['agama'],
            'form_gender' => $input['gender'],
            'form_tempat_lahir' => $input['tempat_lahir'],
            'form_tanggal_lahir' => $input['tanggal_lahir'],
            'form_alamat' => $input['alamat'],
            'form_jenis_alamat' => $input['jenis_alamat'],
            'form_wali' => $input['wali'],
            'form_telp' => $input['telp'],
            'form_orang_tua' => json_encode($input['orangtua']),
            'form_pekerjaan_jabatan' => json_encode($input['pekerjaan_jabatan']),
            'form_as' => $input['form_as'],
            'form_from' => $input['form_from'],
            'form_asal_sekolah' => $input['form_asal_sekolah'],
            'form_tanggal_pindah' => $input['form_tanggal_pindah'],
            'form_dari_kelas' => $input['form_dari_kelas'],
            'form_tk' => $input['form_tk'],
            'form_tahun_tk' => $input['form_tahun_tk'],
            'form_lama_tk' => $input['form_lama_tk'],
        ];

        $getForm = $this->form->where('user_id', $id)->first();

        if ($getForm != NULL) {
            $updateForm = $this->form->update($getForm->form_id, $data);

            if ($updateForm) {
                $type = "success";
                $message = "Berhasil update data";
            } else {
                $message = "Failed to update data";
            }
        } else {
            $message = "No data found for the specified user ID";
        }

        return redirect()->back()->with($type, $message);
    }

    public function students_management()
    {
        $get = $this->request->getGet('page_students');
        if (empty($get)) {
            $get = 1;
        }
        $countPerRows = 10;

        $student = $this->user->join('forms f', 'f.user_id = users.user_id')
            ->where('role_id', 2)
            ->where('f.form_status_id', 2)
            ->orderBy('f.accepted_at');

        $data['title'] = "Siswa";
        $data['students'] = $student->paginate($countPerRows, 'students');
        $data['index'] = ($get * $countPerRows) - $countPerRows + 1;
        $data['pager'] = $student->pager;

        return view('dashboard/students_management', $data);
    }

    // public function getStudentsAjax()
    // {
    //     $keyword = $this->request->getGet('keyword');
    //     $student = $this->user->join('forms f', 'f.user_id = users.user_id')
    //         ->where('role_id', 2)
    //         ->where('f.form_status_id', 2)
    //         ->groupStart()
    //             ->like('f.no_induk_siswa', "$keyword", 'both')
    //             ->orLike('f.form_fullname', "$keyword", 'both')
    //         ->groupEnd()
    //         ->findAll();


    //     echo json_encode($student);
    // }

    public function export_students()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $data['students'] = $students = $this->user->join('forms f', 'f.user_id = users.user_id')
            ->where('role_id', 2)
            ->where('f.form_status_id', 2)
            ->orderBy('f.accepted_at')
            ->findAll();

        $columns = [
            'A' => 'No',
            'B' => 'NIS',
            'C' => 'Nama',
            'D' => 'Agama',
            'E' => 'Jenis Kelamin',
            'F' => 'Tempat, Tanggal Lahir',
            'G' => 'Alamat',
            'H' => 'Jenis Alamat',
            'I' => 'Nama Wali',
            'J' => 'Nama Ayah',
            'K' => 'Nama Ibu',
            'L' => 'No. Telp',
            'M' => 'Asal', // baru | Pindahan
            'N' => 'Asal TK',
            'O' => 'Tahun Lulus TK',
            'P' => 'Lama TK (Tahun)',
            'Q' => 'Asal Sekolah',
            'R' => 'Tanggal Pindah',
            'S' => 'Dari kelas',
            'T' => 'Tanggal Daftar',
        ];

        foreach ($columns as $columnIndex => $columnName) {
            $sheet->setCellValue($columnIndex . '1', $columnName);
        }

        $no = 1;
        $rowIndex = 2;
        foreach ($students as $studentIndex => $student) {
            $sheet->setCellValue('A' . $rowIndex, $no++);
            $sheet->setCellValue('B' . $rowIndex, $student->no_induk_siswa);
            $sheet->setCellValue('C' . $rowIndex, $student->form_fullname);
            $sheet->setCellValue('D' . $rowIndex, $student->form_agama);
            $sheet->setCellValue('E' . $rowIndex, $student->form_gender);
            $sheet->setCellValue('F' . $rowIndex, $student->form_tempat_lahir . ", " . date('d M Y', strtotime($student->form_tanggal_lahir)));
            $sheet->setCellValue('G' . $rowIndex, $student->form_alamat);
            $sheet->setCellValue('H' . $rowIndex, $student->form_jenis_alamat);
            $sheet->setCellValue('I' . $rowIndex, $student->form_wali);
            $sheet->setCellValue('J' . $rowIndex, json_decode($student->form_orang_tua)->ayah);
            $sheet->setCellValue('K' . $rowIndex, json_decode($student->form_orang_tua)->ibu);
            $sheet->setCellValue('L' . $rowIndex, $student->form_telp);
            $sheet->setCellValue('M' . $rowIndex, $student->form_as);
            $sheet->setCellValue('N' . $rowIndex, $student->form_tk != NULL || $student->form_tk != "" ? $student->form_tk : "-");
            $sheet->setCellValue('O' . $rowIndex, $student->form_tahun_tk) != NULL || $student->form_tahun_tk != "" ? $student->form_tahun_tk : "-";
            $sheet->setCellValue('P' . $rowIndex, $student->form_lama_tk != NULL || $student->form_lama_tk != "" ? $student->form_lama_tk : "-");
            $sheet->setCellValue('Q' . $rowIndex, $student->form_asal_sekolah != NULL || $student->form_asal_sekolah != "" ? $student->form_asal_sekolah : "-");
            $sheet->setCellValue('R' . $rowIndex, $student->form_tanggal_pindah !== "0000-00-00" ? $student->form_tanggal_pindah : "-");
            $sheet->setCellValue('S' . $rowIndex, $student->form_dari_kelas != NULL || $student->form_dari_kelas != "" ? $student->form_dari_kelas : "-");
            $sheet->setCellValue('T' . $rowIndex, date('d M Y, H:i:s', strtotime($student->created_at)) . " WIB");

            $rowIndex++;
        }

        // Export
        $write = new Xlsx($spreadsheet);
        $filename = 'Daftar Siswa - ' . date('dmYHis') . ".xlsx";
        $filepath = WRITEPATH . "uploads/" . $filename;
        $write->save($filepath);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        readfile($filepath);
        exit;
    }
}

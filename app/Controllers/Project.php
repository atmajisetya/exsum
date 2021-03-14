<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Project extends BaseController
{
    protected $projectModel;
    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }
    public function index()
    {
        return view('project/index');
    }

    //fungsi untuk menyimpan regiser ke database
    public function save()
    {
        $session = session();
        //inlcude helper form
        helper('form');

        //ambil id user
        $user_id = $session->get('user_id');
        // |is_unique[project.project_name]
        // 'is_unique' => 'Nama proyek sudah terdaftar!'

        //validation
        /*
        if (!$this->validate([
            'project_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama proyek harus diisi!'
                ]
            ],
            'project_manager' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek Manager harus diisi!'
                ]
            ],
            'project_description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek description harus diisi!'
                ]
            ],
            'project_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek kegiatan harus diisi!'
                ]
            ],
            'project_startdate' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek start date harus diisi!'
                ]
            ],
            'project_finishtarget' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek target finish harus diisi!'
                ]
            ],
            'project_stakeholders' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek stakeholders harus diisi!'
                ]
            ],
            'project_resource' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek resource harus diisi!'
                ]
            ],
            'project_progress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek progress harus diisi!'
                ]
            ],
            'project_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Proyek status harus diisi!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/project')->withInput()->with('validation', $validation);
        }
        */

        //menyimpan ke database
        $this->projectModel->save([
            'project_name'     => $this->request->getVar('project_name'),
            'project_manager'    => $this->request->getVar('project_manager'),
            'project_description' => $this->request->getVar('project_description'),
            'project_kegiatan' => $this->request->getVar('project_kegiatan'),
            'project_startdate' => $this->request->getVar('project_startdate'),
            'project_finishtarget' => $this->request->getVar('project_finishtarget'),
            'project_stakeholders' => $this->request->getVar('project_stakeholders'),
            'project_resource' => $this->request->getVar('project_resource'),
            'project_progress' => $this->request->getVar('project_progress'),
            'project_status' => $this->request->getVar('project_status'),
            'created_by' => $this->request->getVar('created_by')
        ]);
        session()->setFlashdata('pesan', 'Proyek berhasil dibuat');
        return redirect()->to('/project');
    }
}

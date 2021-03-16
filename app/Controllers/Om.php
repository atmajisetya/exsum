<?php

namespace App\Controllers;

use App\Models\OmModel;

class Om extends BaseController
{
    protected $omModel;
    public function __construct()
    {
        $this->omModel = new OmModel();
    }
    public function index()
    {
        $session = session();
        //ambil id user
        $user_id = $session->get('user_id');

        $data = [
            'om' => $this->omModel->getOm($user_id)
        ];
        return view('om/index', $data);
    }
    public function save()
    {
        $session = session();
        //inlcude helper form
        helper('form');

        //ambil id user
        $user_id = $session->get('user_id');

        //menyimpan ke databse
        $this->omModel->save([
            'om_activities' => $this->request->getVar('om_activities'),
            'om_description' => $this->request->getVar('om_description'),
            'om_category' => $this->request->getVar('om_category'),
            'om_pic' => $this->request->getVar('om_pic'),
            'om_period' => $this->request->getVar('om_period'),
            'created_by' => $this->request->getVar('created_by')
        ]);
        session()->setFlashdata('pesan', 'OM berhasil dibuat');
        return redirect()->to('/om');
    }
}

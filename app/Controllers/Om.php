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
    //menampilkan detail proyek
    public function detail($id)
    {

        $data = [
            'om' => $this->omModel->detailOm($id)
        ];
        return view('om/detail', $data);
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
            'om_status' => $this->request->getVar('om_status'),
            'created_by' => $this->request->getVar('created_by')
        ]);
        session()->setFlashdata('pesan', 'OM berhasil dibuat');
        return redirect()->to('/om');
    }
    public function update($id)
    {
        //inlcude helper form
        helper('form');

        //menggunakan method save
        //jika disertakan id, CI udah tau kalau yang dimaksud update buka save
        //menyimpan ke databse
        $this->omModel->save([
            'id' => $id,
            'om_activities' => $this->request->getVar('om_activities'),
            'om_description' => $this->request->getVar('om_description'),
            'om_category' => $this->request->getVar('om_category'),
            'om_pic' => $this->request->getVar('om_pic'),
            'om_period' => $this->request->getVar('om_period'),
            'om_status' => $this->request->getVar('om_status')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/om/detail/' . $id);
    }
    //menghapus om
    public function delete($om_id)
    {
        //dd('bakalan hapus dab');
        $this->omModel->delete($om_id);
        session()->setFlashdata('pesan', 'OM berhasil dihapus');
        return redirect()->to('/om');
    }
}

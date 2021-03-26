<?php

namespace App\Controllers;

use App\Models\ActivityModel;

class Activity extends BaseController
{
    protected $omModel;
    public function __construct()
    {
        $this->activityModel = new ActivityModel();
    }
    public function index()
    {
        $session = session();
        //ambil id user
        $user_id = $session->get('user_id');

        $data = [
            'activity' => $this->activityModel->getActivity($user_id)
        ];
        return view('activity/index', $data);
    }
    //menampilkan detail Activity
    public function detail($id)
    {

        $data = [
            'activity' => $this->activityModel->detailActivity($id)
        ];
        return view('activity/detail', $data);
    }

    public function save()
    {
        $session = session();
        //inlcude helper form
        helper('form');



        //menyimpan ke databse
        $this->activityModel->save([
            'activities_main' => $this->request->getVar('activities_main'),
            'activities_submain' => $this->request->getVar('activities_submain'),
            'activities_objective' => $this->request->getVar('activities_objective'),
            'activities_target' => $this->request->getVar('activities_target'),
            'activities_status' => $this->request->getVar('activities_status'),
            'activities_period' => $this->request->getVar('activities_period'),
            'created_by' => $this->request->getVar('created_by')
        ]);
        session()->setFlashdata('pesan', 'Activity Plan berhasil dibuat');
        return redirect()->to('/activity');
    }
    public function update($id)
    {
        //inlcude helper form
        helper('form');

        //menggunakan method save
        //jika disertakan id, CI udah tau kalau yang dimaksud update buka save
        $this->activityModel->save([
            'id' => $id,
            'activities_main' => $this->request->getVar('activities_main'),
            'activities_submain' => $this->request->getVar('activities_submain'),
            'activities_objective' => $this->request->getVar('activities_objective'),
            'activities_target' => $this->request->getVar('activities_target'),
            'activities_period' => $this->request->getVar('activities_period'),
            'activities_status' => $this->request->getVar('activities_status')
        ]);
        session()->setFlashdata('pesan', 'Activity berhasil diubah');
        return redirect()->to('/activity');
    }
    //menghapus proyek
    public function delete($activity_id)
    {
        //dd('bakalan hapus dab');
        $this->activityModel->delete($activity_id);
        session()->setFlashdata('pesan', 'Activity berhasil dihapus');
        return redirect()->to('/activity');
    }
}

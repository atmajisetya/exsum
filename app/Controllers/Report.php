<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Report extends BaseController
{
    protected $projectModel;
    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }
    public function index()
    {

        $data = [
            'project' => $this->projectModel->getAllProject()
        ];
        return view('report/index', $data);
    }
    //menampilkan detail proyek
    public function detail($id)
    {

        $data = [
            'project' => $this->projectModel->detailProject($id)
        ];
        return view('report/detail', $data);
    }
}

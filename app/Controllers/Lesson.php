<?php

namespace App\Controllers;

use App\Models\LessonModel;
use App\Models\ProjectModel;

class Lesson extends BaseController
{
    protected $lessonModel;
    protected $projectModel;
    public function __construct()
    {
        $this->lessonModel = new LessonModel();
        $this->projectModel = new ProjectModel();
    }
    public function index()
    {
        $session = session();
        //ambil id user
        $user_id = $session->get('user_id');

        $data = [
            'lesson' => $this->lessonModel->getLesson($user_id)
        ];
        return view('lesson/index', $data);
    }
    //menampilkan detail Lesson
    public function detail($id, $project_id)
    {
        $data = [
            'lesson' => $this->lessonModel->detailLesson($id),
            'project' => $this->projectModel->detailProject($project_id)
        ];
        return view('lesson/detail', $data);
    }
    public function save()
    {
        $session = session();
        //inlcude helper form
        helper('form');

        //ambil id user
        $user_id = $session->get('user_id');

        //menyimpan ke databse
        $this->lessonModel->save([
            'lesson_issue' => $this->request->getVar('lesson_issue'),
            'lesson_solution' => $this->request->getVar('lesson_solution'),
            'lesson_action' => $this->request->getVar('lesson_action'),
            'lesson_period' => $this->request->getVar('lesson_period'),
            'created_by' => $this->request->getVar('created_by'),
            'project_id' => $this->request->getVar('project')
        ]);
        session()->setFlashdata('pesan', 'Lesson Learned berhasil dibuat');
        return redirect()->to('/lesson');
    }
    public function update($id)
    {
        //inlcude helper form
        helper('form');

        //menggunakan method save
        //jika disertakan id, CI udah tau kalau yang dimaksud update buka save
        $this->lessonModel->save([
            'id' => $id,
            'lesson_issue' => $this->request->getVar('lesson_issue'),
            'lesson_solution' => $this->request->getVar('lesson_solution'),
            'lesson_action' => $this->request->getVar('lesson_action'),
            'lesson_period' => $this->request->getVar('lesson_period')
        ]);
        session()->setFlashdata('pesan', 'Lesson berhasil diubah');
        return redirect()->to('/lesson');
    }
    //menghapus proyek
    public function delete($lesson_id)
    {
        //dd('bakalan hapus dab');
        $this->lessonModel->delete($lesson_id);
        session()->setFlashdata('pesan', 'Lesson berhasil dihapus');
        return redirect()->to('/lesson');
    }
}

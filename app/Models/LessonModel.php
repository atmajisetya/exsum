<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table = 'lesson';
    protected $useTimestamps = true;
    protected $allowedFields = ['lesson_issue', 'lesson_solution', 'lesson_action', 'lesson_period', 'created_by', 'project_id'];

    public function getLesson($user_id)
    {

        return $this->where(['created_by' => $user_id])->findAll();
    }
    public function detailLesson($id)
    {
        return $this->where(['id' => $id])->first();
    }
}

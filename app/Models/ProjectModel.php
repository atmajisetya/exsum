<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $useTimestamps = true;
    protected $allowedFields = ['project_name', 'project_manager', 'project_description', 'project_kegiatan',  'project_startdate', 'project_finishtarget', 'project_stakeholders', 'project_resource', 'project_progress', 'project_status', 'project_problem', 'created_by'];

    public function getProject($user_id)
    {
        /*
        if ($slug == false) {
            return $this->findAll();
        }
        */

        return $this->where(['created_by' => $user_id])->findAll();
    }
    public function detailProject($id)
    {
        return $this->where(['id' => $id])->first();
    }
    public function getAllProject()
    {
        return $this->findAll();
    }
}

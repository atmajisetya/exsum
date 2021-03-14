<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $useTimestamps = true;
    protected $allowedFields = ['project_name', 'project_manager', 'project_description', 'project_kegiatan',  'project_startdate', 'project_finishtarget', 'project_stakeholders', 'project_resource', 'project_progress', 'project_status', 'created_by'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table = 'activities';
    protected $useTimestamps = true;
    protected $allowedFields = ['activities_main', 'activities_submain', 'activities_objective', 'activities_progress', 'activities_status', 'activities_target',  'created_by'];

    public function getActivity($user_id)
    {

        return $this->where(['created_by' => $user_id])->findAll();
    }
    public function detailActivity($id)
    {
        return $this->where(['id' => $id])->first();
    }
}

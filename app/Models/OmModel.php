<?php

namespace App\Models;

use CodeIgniter\Model;

class OmModel extends Model
{
    protected $table = 'om';
    protected $useTimestamps = true;
    protected $allowedFields = ['om_activities', 'om_description', 'om_progress', 'om_status', 'om_category', 'om_period', 'om_pic', 'created_by'];

    public function getOm($user_id)
    {

        return $this->where(['created_by' => $user_id])->findAll();
    }
    public function detailOm($id)
    {
        return $this->where(['id' => $id])->first();
    }
}

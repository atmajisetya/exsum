<?php

namespace App\Controllers;

use App\Models\UserModel;

class Project extends BaseController
{
    public function index()
    {
        return view('project/index');
    }
}

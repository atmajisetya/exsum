<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home/login');
	}
	public function register()
	{
		return view('home/register');
	}
}

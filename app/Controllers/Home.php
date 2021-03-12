<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new UserModel();
	}
	public function index()
	{
		return view('home/login');
	}
	public function register()
	{
		$data = [
			'validation' => \Config\Services::validation()
		];
		return view('home/register', $data);
	}
	//method untuk menangani login
	public function auth()
	{
		$session = session();
		$name = $this->request->getVar('user_name');
		$password = $this->request->getVar('user_password');
		$data = $this->userModel->where('user_name', $name)->first();
		if ($data) {

			$pass = $data['user_password'];
			$verify_pass = password_verify($password, $pass);
			if ($verify_pass) {
				$ses_data = [
					'user_id'       => $data['user_id'],
					'user_name'     => $data['user_name'],
					'user_email'    => $data['user_email'],
					'logged_in'     => TRUE
				];
				$session->set($ses_data);
				dd('Login berhasil');
				return redirect()->to('/dashboard');
			} else {
				$session->setFlashdata('msg', 'Password salah');
				return redirect()->to('/home');
			}
		} else {
			$session->setFlashdata('msg', 'User Name tidak ditemukan');
			return redirect()->to('/home');
		}
	}
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/home');
	}

	public function save()
	{
		//inlcude helper form
		helper('form');

		//validation
		if (!$this->validate([
			'user_name' => [
				'rules' => 'required|is_unique[users.user_name]',
				'errors' => [
					'required' => 'User Name harus diisi!',
					'is_unique' => 'User Name sudah terdaftar!'
				]
			],
			'user_password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password harus diisi!'
				]
			],
			'confpassword' => [
				'rules' => 'required|matches[user_password]',
				'errors' => [
					'required' => 'Password harus diisi!',
					'matches' => 'Password tidak cocok'
				]
			],
			'user_email' => [
				'rules' => 'required|valid_email|is_unique[users.user_email]',
				'errors' => [
					'required' => 'Email harus diisi!',
					'valid_email' => 'Email anda tidak valid',
					'is_unique' => 'Email sudah terdaftar'
				]
			],
			'user_position' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Job Position harus diisi!'
				]
			]

		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/home/register')->withInput()->with('validation', $validation);
		}

		//menyimpan ke database
		$this->userModel->save([
			'user_name'     => $this->request->getVar('user_name'),
			'user_email'    => $this->request->getVar('user_email'),
			'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT),
			'user_position' => $this->request->getVar('user_position')
		]);
		dd("berhasildab");
		return redirect()->to('/home');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

	public function index()
	{
		if($this->session->userdata("id")) redirect("admin/dashboard");		
		$this->load->view('Pages/Admin/Login');
	}

	public function store(){
		try{
			$input = $this->input->post();
			$data = [
				"username" => $input['username'],
				"password" => $input['password']
			];
			$search = $this->db->get_where("user",["username" => $data["username"]]);
			if(!$search->num_rows()){
				throw new Exception("Username atau Password salah");
			}
			$source = $search->row();
			if(!password_verify($data["password"],$source->password)){
				throw new Exception("Username atau Password salah");
			}

			$session = [
				"id"		=> $source->id,
				"username"  => $source->username
			];

			$this->session->set_userdata($session);
			redirect("admin/dashboard");
		}catch(Exception | Throwable $error){
			$this->session->set_flashdata("pesan",$error->getMessage());
			redirect("admin/login");
		}
	}

	public function logout(){
		session_destroy();
		redirect("admin/login");
	}
}

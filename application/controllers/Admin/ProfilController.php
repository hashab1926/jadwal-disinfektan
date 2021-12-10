<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilController extends CI_Controller
{

	public function index()
	{
		$data = [
			"page" 		=> "Pages/Admin/ProfilSaya/index",
			"id"  		=> $this->session->userdata("id"),
			"username"  => $this->session->userdata("username"),
			"js"		=> [
				base_url("assets/js/Pages/Admin/Profil/index.js")
			]
		];
		$this->load->view("Templates/Templates",$data);
	}

	public function store()
	{
		try {
			$input = $this->input->post();
			$data = [
				"username" 		=> $input['username'],
			];
			if(strlen($input['password'])){
				$data['password'] = password_hash($input['password'],PASSWORD_BCRYPT);
			}
			$cari = $this->db->get_where("user",["id" => $input['id']]);
			if(!$cari->num_rows()){
				throw new Exception("Akun tidak ditemukan");
			}
			$this->db->where('id',$input['id']);
			$this->db->update("user",$data);
			$this->session->set_userdata("username",$input['username']);
			$response = [
				"status_code" => 200,
				"message"	  => "Profil telah ganti"
			];
		} catch (Exception | Throwable $error) {
			$response = [
				"status_code" => 400,
				"message"	  => $error->getMessage()
			];
		} finally {
			echo json_encode($response);
		}
	}

}

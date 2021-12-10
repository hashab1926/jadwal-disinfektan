<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function index()
	{
		try{
			$input = $this->input->get();			
			$likeBulan = date("Y-m");
			$bulan = date("m");
			if(isset($input["month"])){
				$bulan = $input["month"];
				$likeBulan = date("Y-").str_pad($input["month"], 2, '0', STR_PAD_LEFT);
			}
			$totalJadwal = $this->db->from("jadwal_disinfektan")
			->like("jadwal", $likeBulan)
			->get();

			$data = [
				"status_code" => 200,
				"message"	  => "ok",
				"data"		  => $totalJadwal->result_array(),
				"bulan"		  => $bulan
			];

		}catch(Exception | Throwable $error){
			$data = [
				"status_code" => 400,
				"message"	  => $error->getMessage()
			];
		}finally{
			$this->load->view('Pages/User/Dashboard',$data);
		}
	}
}

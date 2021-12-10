<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("id")) redirect("admin/login");
	}

	private function totalTahunIni()
	{
		$tahunIni = date("Y");
		$totalJadwal = $this->db->like("jadwal", $tahunIni)->get("jadwal_disinfektan");
		$tahunIni = $this->db->select("SUM(total_disinfektan) AS total_disinfektan")
			->from("jadwal_disinfektan")
			->like("jadwal", $tahunIni)
			->get();
		$data = [
			"total_jadwal" 		=> $totalJadwal->num_rows(),
		];
		if ($tahunIni->num_rows()) {
			$data["total_disinfektan"] = $tahunIni->row()->total_disinfektan;
		}

		return $data;
	}
	private function totalBulanIni()
	{
		$bulanIni = date("Y-m");
		$totalJadwal = $this->db->like("jadwal", $bulanIni)->get("jadwal_disinfektan");
		$bulanIni = $this->db->select("SUM(total_disinfektan) AS total_disinfektan")
			->from("jadwal_disinfektan")
			->like("jadwal", $bulanIni)
			->get();
		$data = [
			"total_jadwal" 		=> $totalJadwal->num_rows(),
		];
		if ($bulanIni->num_rows()) {
			$data["total_disinfektan"] = $bulanIni->row()->total_disinfektan;
		}

		return $data;
	}
	private function totalHariIni(){
		$tglHariIni = date("Y-m-d");
		$totalJadwal = $this->db->get_where("jadwal_disinfektan",["jadwal" => $tglHariIni]);
		$hariIni = $this->db->select("SUM(total_disinfektan) AS total_disinfektan")
					 		->from("jadwal_disinfektan")
							->where(["jadwal" => $tglHariIni])->get();
		$data = [
			"total_jadwal" 		=> $totalJadwal->num_rows(),
		];
		if($hariIni->num_rows()){
			$data["total_disinfektan"] = $hariIni->row()->total_disinfektan;
		}

		return $data;
	}

	public function index()
	{
		$sumarryHariIni = $this->totalHariIni();
		$sumarryBulanIni = $this->totalBulanIni();
		$sumarryTahunIni = $this->totalTahunIni();
		$data = [
			"page" 		=> "Pages/Admin/Dashboard",
			"hariini"   => $sumarryHariIni,
			"bulanini"  => $sumarryBulanIni,
			"tahunini"  => $sumarryTahunIni,
		];
		$this->load->view('Templates/Templates',$data);
	}
}

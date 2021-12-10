<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("id")) redirect("admin/login");
	}

	public function index(){
		$data = [
			"page" => "Pages/Admin/Laporan/index",
			"css"  => [
				'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'
			],
			'js'   => [
				'https://cdn.jsdelivr.net/npm/flatpickr',
				base_url("assets/js/Pages/Admin/Laporan/index.js"),
			]
		];
		$this->load->view("Templates/Templates",$data);
	}

	public function getLaporan(){
		try{
			$input = $this->input->get();
			$range = explode(" to ", $input['range']);
			if(count($range) === 1){
				$range[] = $range[0];
			}
			// $this->library->printr($range);
			$laporan = $this->db->from("jadwal_disinfektan")
								->where("jadwal >=",$range[0])
								->where("jadwal <=",$range[1])
								->order_by("jadwal","desc")
								->get();
			if(!$laporan->num_rows()){
				throw new Exception("Laporan tidak ditemukan");
			}
			$response = [
				"status_code"	=> 200,
				"message"		=> "ok",
				"data"			=> $laporan->result_array()
			];

		}catch(Exception | Throwable $error){
			$response =[
				"status_code"	=> 400,
				"message"		=> $error->getMessage()
			];
		}finally{
			echo json_encode($response);
		}
	}

	public function downloadLaporan(){
		try {
			$input = $this->input->get();
			$range = explode(" to ", $input['range']);
			if (count($range) === 1) {
				$range[] = $range[0];
			}
			// $this->library->printr($range);
			$laporan = $this->db->from("jadwal_disinfektan")
				->where("jadwal >=", $range[0])
				->where("jadwal <=", $range[1])
				->order_by("jadwal", "desc")
				->get();
			if (!$laporan->num_rows()) {
				throw new Exception("Laporan tidak ditemukan");
			}

			$this->load->library('pdf');

			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "LAPORAN-" . str_replace(" ", "_", $input['range']) . ".pdf";
			$this->pdf->load_view('Pages/Admin/Laporan/Print', ['data' => $laporan->result_array()]);
		} catch (Exception | Throwable $error) {
			$response = [
				"status_code"	=> 400,
				"message"		=> $error->getMessage()
			];
			redirect("admin/laporan");
		}
	}
}

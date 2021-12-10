<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("id")) redirect("admin/login");
	}

	public function index()
	{
		$data = [
			'css'  => [
				'https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css',
				'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css',
				'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'
			],
			'js'   => [
				'https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js',
				'https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js',
				'https://cdn.jsdelivr.net/npm/flatpickr',
				base_url('assets/vendors/jqueryValidate/jquery.validate.min.js'),
				base_url('assets/js/Pages/Admin/Jadwal/index.js')
			],
			'page' => 'Pages/Admin/Jadwal/index'
		];

		$this->load->view('Templates/Templates',$data);
	}

	public function editStore(){
		try {
			$input = $this->input->post();
			$jamRange = "{$input['jam_awal']}-{$input['jam_akhir']}";
			$data = [
				"nama_petugas" 		=> $input['nama_petugas'],
				"jadwal" 			=> $input['jadwal'],
				"jam_range" 		=> $jamRange,
				"total_disinfektan" => $input['total_disinfektan']
			];
			$this->db->where("id",$input["id"]);
			$this->db->update('jadwal_disinfektan', $data);
			$response = [
				"status_code" => 201,
				"message"	  => "Jadwal {$input['nama_petugas']} telah di atur ulang"
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

	public function deleteStore(){
		try {
			$input = $this->input->post();
			$id = $input["id"];
			$this->db->delete('jadwal_disinfektan', ["id" => $id]);
			$response = [
				"status_code" => 201,
				"message"	  => "Jadwal telah di hapus"
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
	
	public function store(){
		try{
			$input = $this->input->post();
			$jamRange = "{$input['jam_awal']}-{$input['jam_akhir']}";
			$data = [
				"nama_petugas" => $input['nama_petugas'],
				"jadwal" 		=> $input['jadwal'],
				"jam_range" 	=> $jamRange,
			];
			$this->db->insert('jadwal_disinfektan',$data);
			$response = [
				"status_code" => 201,
				"message"	  => "Jadwal telah ditambahkan"
			];
		}catch(Exception | Throwable $error){
			$response = [
				"status_code" => 400,
				"message"	  => $error->getMessage()
			];
		}finally{
			echo json_encode($response);
		}
	}

	public function eventSource()
	{
		try{
			$getJadwal = $this->db->get('jadwal_disinfektan')->result_array();
			$tampung = [];
			$listColor = [
				"Sun" => "#8c1c13",
				"Mon" => "#023047",
				"Tue" => "#a78a7f",
				"Wed" => "#2a9d8f",
				"Thu" => "#e9c46a",
				"Fri" => "#f4a261",
				"Sat" => "#e76f51",
			];
			foreach($getJadwal as $key => $item ):
				$total = $item["total_disinfektan"] > 0 ? "<div class='d-flex align-items-center'><i class='bi bi-bug'></i> Total disinfektan : {$item['total_disinfektan']}</div>" : "";
				$tampung[] = [
					"id"      => $item["id"],
					"title"   => "<div class='d-flex flex-column'>
										<div>
											<span style='display:inline-block; position:absolute; top:5px' class='bi bi-alarm'></span> 
											<div class='margin-left-4'><b>{$item['nama_petugas']}</b> jam {$item['jam_range']}</div> 
											
										</div>
										<div class='margin-top-1'>{$total}</div>
								 </div>",
					"start"   => $item['jadwal'],
					"end" 	  => $item['jadwal'],
					"description" => "{$item['nama_petugas']} Jam {$item['jam_range']}",
					"color" => $listColor[date('D', strtotime($item['jadwal']))],
				];
			endforeach;

			echo json_encode($tampung);
		} catch (Exception | Throwable $error) {
		}
	}

	public function getDetail($id){
		try{
			$getDetail = $this->db->get_where('jadwal_disinfektan',["id" => $id]);
			if(!$getDetail->num_rows())
				throw new Exception("Jadwal tidak ditemukan");

			$response = [
				"status_code" => 200,
				"data"		  => $getDetail->row(),
				"message"	  => "ok"
			];
		} catch (Exception | Throwable $error) {
			$response = [
				"status_code" => 400,
				"message"	  => $error->getMessage()
			];
		}finally{
			echo json_encode($response);
		}
	}
}

<?php
class Library
{
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	public function printr($print, $exit = true)
	{
		echo '<pre>' . print_r($print, true) . '</pre>';
		if ($exit != false)
			exit(1);
	}

	function BulanToText($number)
	{
		$tampung = '';
		switch ($number) {
			case 1:
				$tampung = 'Januari';
				break;
			case 2:
				$tampung = 'Februari';
				break;
			case 3:
				$tampung = 'Maret';
				break;
			case 4:
				$tampung = 'April';
				break;
			case 5:
				$tampung = 'Mei';
				break;
			case 6:
				$tampung = 'Juni';
				break;
			case 7:
				$tampung = 'Juli';
				break;
			case 8:
				$tampung = 'Agustus';
				break;
			case 9:
				$tampung = 'September';
				break;
			case 10:
				$tampung = 'Oktober';
				break;
			case 11:
				$tampung = 'November';
				break;
			case 12:
				$tampung = 'Desember   ';
				break;
		}

		return $tampung;
	}

	function tanggalToText($Tgl, $Time = true)
	{

		$Explode = explode(' ', $Tgl);
		$ExplodeDate = explode('-', $Explode[0]);
		if ($Time == true) {
			$ExplodeTime = explode(':', $Explode[1]);
			$Jam = $ExplodeTime[0];
			$Menit = $ExplodeTime[1];
		}

		$Year = $ExplodeDate[0];
		$Month = $ExplodeDate[1];
		$Date = $ExplodeDate[2];


		$Month = $this->bulanToText($Month);
		if ($Time == false)
			return "{$Date} {$Month} {$Year}";

		return "{$Date} {$Month} {$Year} jam {$Jam}:{$Menit}";
	}

}

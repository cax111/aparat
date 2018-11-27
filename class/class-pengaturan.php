<?php
	class pengaturan {
		function formatUang($uang){
			$hasil_rupiah = number_format($uang,0,',','.');
			return $hasil_rupiah;
		}
		function penjumlahanTanggal($tanggal,$hari){
			for($i=0;$i<$hari-1;$i++){
    			if(date('D', strtotime($tanggal))!='Sat' || date('D', strtotime($tanggal))!='Sun'){
					$tanggal = date('Y-m-d', strtotime("+1 days", strtotime($tanggal))); //operasi penjumlahan tanggal sebanyak 6 hari
				}
			}
			return $tanggal;
		}
		function tanggalToNamaHari($tanggal){
			$day = date('D', strtotime($tanggal));
			
			$dayList = array(
				'Sun' => 'Minggu',
				'Mon' => 'Senin',
				'Tue' => 'Selasa',
				'Wed' => 'Rabu',
				'Thu' => 'Kamis',
				'Fri' => 'Jumat',
				'Sat' => 'Sabtu'
			);

			return $dayList[$day];
		}
		function formatTanggal2($tanggal){
			$pisah = explode('-',$tanggal);
			
			$tanggal = $this->penyebut($pisah[2]);

			$tahun = $this->penyebut($pisah[0]);
			
			$bulan="";
			switch ($pisah[1]) {
				case 1:
					$bulan = 'Januari';
					break;
				case 2:
					$bulan = 'Febuari';
					break;
				case 3:
					$bulan = 'Maret';
					break;
				case 4:
					$bulan = 'April';
					break;
				case 5:
					$bulan = 'Mei';
					break;
				case 6:
					$bulan = 'Juni';
					break;
				case 7:
					$bulan = 'Juli';
					break;
				case 8:
					$bulan = 'Agustus';
					break;
				case 9:
					$bulan = 'September';
					break;
				case 10:
					$bulan = 'Oktober';
					break;
				case 11:
					$bulan = 'November';
					break;
				case 12:
					$bulan = 'Desember';
					break;
				
				default:
					echo "tidak ada datanya";
					break;
			}

			$format = $tanggal." Bulan ".$bulan." Tahun".$tahun;
			return $format;
		}

		function formatTanggal($tanggal){
			$pisah = explode('-',$tanggal);
			$bulan="";
			switch ($pisah[1]) {
				case 1:
					$bulan = 'Januari';
					break;
				case 2:
					$bulan = 'Febuari';
					break;
				case 3:
					$bulan = 'Maret';
					break;
				case 4:
					$bulan = 'April';
					break;
				case 5:
					$bulan = 'Mei';
					break;
				case 6:
					$bulan = 'Juni';
					break;
				case 7:
					$bulan = 'Juli';
					break;
				case 8:
					$bulan = 'Agustus';
					break;
				case 9:
					$bulan = 'September';
					break;
				case 10:
					$bulan = 'Oktober';
					break;
				case 11:
					$bulan = 'November';
					break;
				case 12:
					$bulan = 'Desember';
					break;
				
				default:
					echo "tidak ada datanya";
					break;
			}

			$format = $pisah[2]." ".$bulan." ".$pisah[0];
			return $format;
		}

		function penyebut($nilai) {
			$nilai = abs($nilai);
			$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			$temp = "";
			if ($nilai < 12) {
				$temp = " ". $huruf[$nilai];
			} else if ($nilai <20) {
				$temp = $this->penyebut($nilai - 10). " Belas";
			} else if ($nilai < 100) {
				$temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
			} else if ($nilai < 200) {
				$temp = " Seratus" . $this->penyebut($nilai - 100);
			} else if ($nilai < 1000) {
				$temp = $this->penyebut($nilai/100) . " Ratus" . $this->penyebut($nilai % 100);
			} else if ($nilai < 2000) {
				$temp = " Seribu" . $this->penyebut($nilai - 1000);
			} else if ($nilai < 1000000) {
				$temp = $this->penyebut($nilai/1000) . " Ribu" . $this->penyebut($nilai % 1000);
			} else if ($nilai < 1000000000) {
				$temp = $this->penyebut($nilai/1000000) . " Juta" . $this->penyebut($nilai % 1000000);
			} else if ($nilai < 1000000000000) {
				$temp = $this->penyebut($nilai/1000000000) . " Milyar" . $this->penyebut(fmod($nilai,1000000000));
			} else if ($nilai < 1000000000000000) {
				$temp = $this->penyebut($nilai/1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai,1000000000000));
			}  
			return $temp;
		}
	}
?>
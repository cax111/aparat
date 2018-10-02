<?php
	class kelolaSuratKontrak extends database{
		function tampilUniversitas(){
			$tampil=parent::koneksi()->prepare("SELECT * FROM universitas ORDER BY id_universitas ASC");
		    $tampil->execute();
		    while ($t=$tampil->fetch()) {
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}

		function tampilFakultas(){
			$tampil=parent::koneksi()->prepare("SELECT * FROM fakultas ORDER BY id_fakultas ASC");
		    $tampil->execute();
		    while ($t=$tampil->fetch()) {
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}

		function tampilJurusan($fak_id){
			$tampil=parent::koneksi()->prepare("SELECT * FROM jurusan where id_fakultas = '$fak_id'");
		    $tampil->execute();
		    while ($t=$tampil->fetch()) {
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}

		function tampilJurusan2(){
			$tampil=parent::koneksi()->prepare("SELECT * FROM jurusan");
		    $tampil->execute();
		    while ($t=$tampil->fetch()) {
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}	

		function tampilKontrak($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM surat_kontrak ".$order);
		    $tampil->execute();
		    while ($t=$tampil->fetch()) {
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}


		function tampilPanitia($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM panitia_pengawas ".$order);
		    $tampil->execute();
		    while ($t=$tampil->fetch()) {
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}

		function insertKontrak($judul,$id_jurusan,$id_user,$tahun_surat,$nama_ppk,$nip_ppk,$nama_ppb,$nip_ppb,$kpph,$spph,$apph,$pphp1,$pphp2,$pphp3){
			$insert=parent::koneksi()->prepare("INSERT INTO surat_kontrak (judul_surat,id_jurusan,id_user,tahun_surat,nama_ppk,nip_ppk,nama_ppb,nip_ppb) VALUES(?,?,?,?,?,?,?,?)");
			$insert->BindParam(1,$judul);
			$insert->BindParam(2,$id_jurusan);
			$insert->BindParam(3,$id_user);
			$insert->BindParam(4,$tahun_surat);
			$insert->BindParam(5,$nama_ppk);
			$insert->BindParam(6,$nip_ppk);
			$insert->BindParam(7,$nama_ppb);
			$insert->BindParam(8,$nip_ppb);
			$insert->execute();

			if($insert->rowCount()==0){
			   return "Input Data Gagal.";
			}else{
				$tampil=parent::koneksi()->prepare("SELECT id_surat FROM surat_kontrak ORDER BY id_surat DESC LIMIT 1");
				$tampil->execute();
				$id_surat=0;
				
				while ($t=$tampil->fetch()) {
					$id_surat=$t['id_surat'];
				}
				$ketua = "Ketua";
				$sekretaris = "Sekretaris";
				$anggota = "Anggota";
				$jpphk1 = "Panitia Penerima Hasil Kerja 1";
				$jpphk2 = "Panitia Penerima Hasil Kerja 2";
				$jpphk3 = "Panitia Penerima Hasil Kerja 3";
				$insert=parent::koneksi()->prepare("INSERT INTO panitia_pengawas (id_surat,nama_panitia,jabatan_panitia) VALUES(?,?,?),(?,?,?),(?,?,?),(?,?,?),(?,?,?),(?,?,?)");
			    $insert->BindParam(1,$id_surat);
			    $insert->BindParam(2,$kpph);
			    $insert->BindParam(3,$ketua);
			    $insert->BindParam(4,$id_surat);
			    $insert->BindParam(5,$spph);
			    $insert->BindParam(6,$sekretaris);
			    $insert->BindParam(7,$id_surat);
			    $insert->BindParam(8,$apph);
			    $insert->BindParam(9,$anggota);
			    $insert->BindParam(10,$id_surat);
			    $insert->BindParam(11,$pphp1);
			    $insert->BindParam(12,$jpphk1);
			    $insert->BindParam(13,$id_surat);
			    $insert->BindParam(14,$pphp2);
			    $insert->BindParam(15,$jpphk2);
			    $insert->BindParam(16,$id_surat);
			    $insert->BindParam(17,$pphp3);
			    $insert->BindParam(18,$jpphk3);
			    $insert->execute();
			    
				echo $insert->errorInfo();
				if($insert->rowCount()==0){
					echo"gagal";
					return "Input Data Gagal.";
				}else{
					echo"berhasil";
				    return "Input Data Berhasil.";
				}
			}
		}
	}
?>
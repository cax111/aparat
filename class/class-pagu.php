<?php
	class kelolaPagu extends database{
		function tampilSatuan($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM satuan".$order);
		    $tampil->execute();
		    while ($t=$tampil->fetch()){
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}

		function tampilPagu($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM pagu ".$order);
		    $tampil->execute();
		    while ($t=$tampil->fetch()){
		    	$data[]=$t;
		    }
		    if(!empty($data)){
		    	return $data;
		    }else{
		    	return null;
		    }
		}

		function insertPagu($judul,$id_jurusan,$id_user,$tahun_surat,$nama_ppk,$nip_ppk,$nama_ppb,$nip_ppb){
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
			    return "Input Data Berhasil.";
			}
		}
	}
?>
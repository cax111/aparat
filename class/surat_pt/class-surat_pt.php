<?php
	class kelolaSuratPT extends database{
		function tampilPT($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM surat_pt ".$order);
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

		function insertPH($nomor,$id_surat){
			$insert=parent::koneksi()->prepare("INSERT INTO surat_pt (id_surat,nomor_ph) VALUES(?,?)");
			$insert->BindParam(1,$id_surat);
			$insert->BindParam(2,$nomor);
			$insert->execute();

			if($insert->rowCount()==0){
			   return "Input Data Gagal.";
			}else{
				echo"berhasil";
				return "Input Data Berhasil.";
			}
		}

		function editPH($nomor,$id_surat){
			$insert=parent::koneksi()->prepare("UPDATE surat_pt SET nomor_ph=? WHERE id_surat=?");
			$insert->BindParam(1,$nomor);
			$insert->BindParam(2,$id_surat);
			$insert->execute();

			if($insert->rowCount()==0){
			   return "Input Data Gagal.";
			}else{
				echo"berhasil";
				return "Input Data Berhasil.";
			}
		}
	}
?>
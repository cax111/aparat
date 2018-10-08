<?php
	class barang extends database{
		function tampilBarang($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM barang".$order);
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
		function banyakBarang($order){
			$tampil=parent::koneksi()->prepare("SELECT COUNT(nama_barang) AS hitung FROM barang".$order);
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
		function uploadGambar($nama,$ekstensi,$ukuran,$file_tmp,$link,$id_barang){

				$ekstensi_diperbolehkan	= array('png','jpg');
				if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 1044070){			
						move_uploaded_file($file_tmp, 'dist/img/'.$nama);
						$query=parent::koneksi()->prepare("UPDATE barang SET gambar=?, link=? WHERE id_barang=?");
		    
						$query->BindParam(1,$nama);
						$query->BindParam(2,$link);
						$query->BindParam(3,$id_barang);
						$query->execute();
						echo var_dump($query->errorInfo());
						if($query->RowCount()==0){
							return 'GAGAL MENGUPLOAD GAMBAR';
						}else{
							return 'FILE BERHASIL DI UPLOAD';
						}
					}else{
						return 'UKURAN FILE TERLALU BESAR';
					}
				}else{
					return 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
				}
		}
	}
?>
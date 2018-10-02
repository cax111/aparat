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
	}
?>
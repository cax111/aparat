<?php
	class kelolaUser extends database{
		function loginUser($username,$password){
			$tampil=parent::koneksi()->prepare("SELECT id_user,username,password FROM akun_user WHERE username='$username' AND password='$password'");
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

		function tampilUser($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM akun_user ".$order);
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

		function ubahUser($nama_perusahaan,$nama_user,$alamat_perusahaan,$npwp,$no_telp,$email,$id_user){
			$update=parent::koneksi()->prepare("UPDATE akun_user SET nama_perusahaan=?, nama_user=?, alamat_perusahaan=?, npwp=?, no_telp=?, email=? WHERE id_user=?");
		    $update->BindParam(1,$nama_perusahaan);
		    $update->BindParam(2,$nama_user);
		    $update->BindParam(3,$alamat_perusahaan);
		    $update->BindParam(4,$npwp);
		    $update->BindParam(5,$no_telp);
		    $update->BindParam(6,$email);
		    $update->BindParam(7,$id_user);
		    $update->execute();
		    if($update->RowCount()==0){
		    	return "Input Data Gagal";
		    }else{
		    	header("location:index.php?page_pengguna=profil-pengguna");
		    }
		}
	}
?>
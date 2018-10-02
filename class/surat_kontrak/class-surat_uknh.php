<?php
class kelolaSuratUKNH extends database{
	function tampilUKNH($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_uknh, tanggal_uknh, waktu_uknh FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertUKNH($nomor_uknh,$tanggal_uknh,$waktu_uknh,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_uknh=?,tanggal_uknh=?,waktu_uknh=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_uknh);
		$insert->BindParam(2,$tanggal_uknh);
		$insert->BindParam(3,$waktu_uknh);
		$insert->BindParam(4,$id_surat);
		$insert->execute();
		if($insert->rowCount()==0){
		   return "Input Data Gagal.";
		}else{
		   	header("location:index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$id_surat");
		}
	}
}
?>
<?php
class kelolaSuratSP extends database{
	function tampilSP($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_sp FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertSP($nomor_sp,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_sp=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_sp);
		$insert->BindParam(2,$id_surat);
		$insert->execute();
		if($insert->rowCount()==0){
		   return "Input Data Gagal.";
		}else{
		   	header("location:index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$id_surat");
		}
	}
}
?>
<?php
class kelolaSuratBAP extends database{
	function tampilBAP($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_bap FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertBAP($nomor_bap,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_bap=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_bap);
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
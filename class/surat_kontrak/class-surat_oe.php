<?php
class kelolaSuratOE extends database{	
	function tampilOE($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_oe, tanggal_oe FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertOE($nomor_oe,$tanggal_oe,$id_surat){
		$update=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_oe=?,tanggal_oe=? WHERE id_surat=?");
		$update->BindParam(1,$nomor_oe);
		$update->BindParam(2,$tanggal_oe);
		$update->BindParam(3,$id_surat);
		$update->execute();
		if($update->rowCount()==0){
		   return "Input Data Gagal.";
		}else{
		   	header("location:index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$id_surat");
		}
	}
}
?>
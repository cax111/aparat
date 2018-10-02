<?php
class kelolaSuratBAKNH extends database{
	function tampilBAKNH($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_baknh, tanggal_baknh FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertBAKNH($nomor_baknh,$tanggal_baknh,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_baknh=?,tanggal_baknh=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_baknh);
		$insert->BindParam(2,$tanggal_baknh);
		$insert->BindParam(3,$id_surat);
		$insert->execute();
		if($insert->rowCount()==0){
		   return "Input Data Gagal.";
		}else{
		   	header("location:index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$id_surat");
		}
	}
}
?>
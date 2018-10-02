<?php
class kelolaSuratBASTB extends database{
	function tampilBASTB($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_bastb FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertBASTB($nomor_bastb,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_bastb=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_bastb);
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
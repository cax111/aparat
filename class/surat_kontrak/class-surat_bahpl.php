<?php
class kelolaSuratBAHPL extends database{
	function tampilBAHPL($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_bahpl FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertBAHPL($nomor_bahpl,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_bahpl=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_bahpl);
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
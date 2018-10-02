<?php
class kelolaSuratBAPPH extends database{
	function tampilBAPPH($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_bapph, tanggal_bapph, hari_bapph FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertBAPPH($nomor_bapph,$tanggal_bapph,$hari_bapph,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_bapph=?,tanggal_bapph=?,hari_bapph=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_bapph);
		$insert->BindParam(2,$tanggal_bapph); 
		$insert->BindParam(3,$hari_bapph);
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
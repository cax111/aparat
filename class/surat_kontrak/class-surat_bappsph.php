<?php
class kelolaSuratBAPPSPH extends database{
	function tampilBAPPSPH($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_bappsph, tanggal_bappsph, waktu_pengerjaan_bappsph FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertBAPPSPH($nomor_bappsph,$tanggal_bappsph,$waktu_pengerjaan,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_bappsph=?, tanggal_bappsph=?, waktu_pengerjaan_bappsph=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_bappsph);
		$insert->BindParam(2,$tanggal_bappsph);
		$insert->BindParam(3,$waktu_pengerjaan);
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
<?php
class kelolaSuratPP extends database{
	function tampilPP($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_pp, tanggal_pp, tanggal_spk_pp, waktu_pp FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertPP($nomor_pp,$tanggal_pp,$tanggal_spk_pp,$waktu_pp,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_pp=?,tanggal_pp=?,tanggal_spk_pp=?,waktu_pp=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_pp);
		$insert->BindParam(2,$tanggal_pp);
		$insert->BindParam(3,$tanggal_spk_pp);
		$insert->BindParam(4,$waktu_pp);
		$insert->BindParam(5,$id_surat);
		$insert->execute();
		if($insert->rowCount()==0){
		   return "Input Data Gagal.";
		}else{
		   	header("location:index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$id_surat");
		}
	}
}
?>
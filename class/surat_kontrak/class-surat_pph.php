<?php
class kelolaSuratPPH extends database{
	function tampilPPH($order){
		$tampil=parent::koneksi()->prepare("SELECT nomor_pph, tanggal_pph, tanggal_penawaran_pph FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertPPH($nomor_pph,$tanggal_pph,$tanggal_penawaran_pph,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET nomor_pph=?, tanggal_pph=?, tanggal_penawaran_pph=? WHERE id_surat=?");
		$insert->BindParam(1,$nomor_pph);
		$insert->BindParam(2,$tanggal_pph);
		$insert->BindParam(3,$tanggal_penawaran_pph);
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
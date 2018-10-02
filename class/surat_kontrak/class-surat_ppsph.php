<?php
class kelolaSuratPPSPH extends database{
	function tampilPPSPH($order){
		$tampil=parent::koneksi()->prepare("SELECT waktu_ppsph FROM surat_kontrak WHERE id_surat='".$order."'");
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
	function insertPPSPH($waktu_ppsph,$id_surat){
		$insert=parent::koneksi()->prepare("UPDATE surat_kontrak SET waktu_ppsph=? WHERE id_surat=?");
		//$insert->BindParam(1,$tanggal_ppsph);
		$insert->BindParam(1,$waktu_ppsph);
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
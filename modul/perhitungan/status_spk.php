<?php

$id = $_GET['id'];
include "../../class/koneksi.php";
include "../../class/surat_pagu/class-surat_spk.php";
$surat_spk = new spk;
$tampil = $surat_spk->tampilhargaspk($id);
$tampil->setFetchMode(PDO::FETCH_ASSOC);
$t = $tampil->fetch();

if(isset($t['id_barang'])){
  echo "Rp. ".$t['total_harga_spk'];

}else{
  echo "Rp. "."0";
}
?>

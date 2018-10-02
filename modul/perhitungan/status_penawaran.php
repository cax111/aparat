<?php

$id = $_GET['id'];
include "../../class/koneksi.php";
include "../../class/surat_pagu/class-surat_penawaran.php";
$surat_penawaran = new penawaran;
$tampil = $surat_penawaran->tampilhargapenawaran($id);
$tampil->setFetchMode(PDO::FETCH_ASSOC);
$t = $tampil->fetch();

if(isset($t['id_barang'])){
  echo "Rp. ".$t['total_harga_penawaran'];

}else{
  echo "Rp. "."0";
}
?>

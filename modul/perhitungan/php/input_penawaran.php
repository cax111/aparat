<?php


include "../../../class/koneksi.php";
include "../../../class/surat_pagu/class-surat_penawaran.php";
$surat_penawaran = new penawaran;

$id_barang = $_POST['id_barang'];

$tampil = $surat_penawaran->tampilhargapenawaran($id_barang);
$tampil->setFetchMode(PDO::FETCH_ASSOC);
$t = $tampil->fetch();

if(isset($t['id_barang'])){
  $status = $surat_penawaran->update_harga_penawaran($_POST['harga_dasar'],$_POST['id_barang'],$_POST['keuntungan'], $_POST['jumlah'],$_POST['ppn'],$_POST['total'],$_POST['total_keseluruhan']);


}else{
  $status = $surat_penawaran->insert_harga_penawaran($_POST['harga_dasar'],$_POST['id_barang'],$_POST['keuntungan'], $_POST['jumlah'],$_POST['ppn'],$_POST['total'],$_POST['total_keseluruhan']);

}



?>

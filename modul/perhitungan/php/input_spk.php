<?php


include "../../../class/koneksi.php";
include "../../../class/surat_pagu/class-surat_spk.php";
$surat_spk = new spk;

$id_barang = $_POST['id_barang'];

$tampil = $surat_spk->tampilhargapenawaran($id_barang);
$tampil->setFetchMode(PDO::FETCH_ASSOC);
$t = $tampil->fetch();

if(isset($t['id_barang'])){
  $status = $surat_spk->update_harga_penawaran($_POST['harga_dasar'],$_POST['id_barang'],$_POST['keuntungan'], $_POST['jumlah'],$_POST['ppn'],$_POST['total'],$_POST['total_keseluruhan']);


}else{
  $status = $surat_spk->insert_harga_penawaran($_POST['harga_dasar'],$_POST['id_barang'],$_POST['keuntungan'], $_POST['jumlah'],$_POST['ppn'],$_POST['total'],$_POST['total_keseluruhan']);

}



?>

<?php

include "../../../class/koneksi.php";
include "../../../class/surat_pagu/class-surat_hps.php";
$surat_hps = new hps;


$status = $surat_hps->inserthps($_POST['nama_barang'],$_POST['spesifikasi'],$_POST['banyak'], $_POST['satuan'],$_POST['id_surat']);
$tampil = $surat_hps->tampilhps();
$tampil->setFetchMode(PDO::FETCH_ASSOC);
$t = $tampil->fetch();
//echo $t['id_barang'];
$harga = $surat_hps->insert_harga_hps($t['id_barang'],$_POST['harga_dasar'],$_POST['keuntungan'],$_POST['jumlah'],$_POST['ppn'],$_POST['hps'],$_POST['total']);





?>

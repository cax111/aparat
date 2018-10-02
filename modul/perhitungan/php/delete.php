<?php
include "../../../class/koneksi.php";
include "../../../class/surat_pagu/class-surat_hps.php";
$surat_hps = new hps;



$status = $surat_hps->delete_penawaran($_GET['id']);
$status = $surat_hps->delete_spk($_GET['id']);
$status = $surat_hps->delete_hps($_GET['id']);
$status = $surat_hps->delete_barang($_GET['id']);

?>

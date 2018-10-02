<?php
    include "../../class/koneksi.php";
    include "../../class/class-pengaturan.php";

    $pengaturan = new pengaturan();

    $hari = $pengaturan->tanggalToNamaHari($_POST['tanggal']);
    echo $hari;
?>
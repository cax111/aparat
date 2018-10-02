<?php

include "../../class/koneksi.php";
include "../../class/surat_kontrak/class-surat_kontrak.php";

$surat_kontrak = new kelolaSuratKontrak;

$fak_id = $_GET['fakultas_id'];
$tampil = $surat_kontrak->tampilJurusan($fak_id);

echo "<select name='jurusan' class='form-control' required>
			<option disabled selected value=''> Pilih Jurusan </option>";
foreach($tampil AS $t){
	echo '	<option value="'.$t['id_jurusan'].'">'.$t['nama_jurusan'].'</option>';
}
echo "</select>";

?>
<?php
//pemanggilan library yang diperlukan

use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\Paragraph;

include_once '../../../vendor/autoload.php';
include '../../class/koneksi.php';
include '../../class/class-pengaturan.php';
//inisialisasi variable POST
$pengaturan = new pengaturan();

$judul = $_POST['judul'];
$nama_jurusan = $_POST['nama_jurusan'];
$nama_fakultas = $_POST['nama_fakultas'];
$nama_universitas = $_POST['nama_universitas'];
$alamat_universitas = $_POST['alamat_universitas'];
$nama_ppk = $_POST['nama_ppk'];
$nip_ppk = $_POST['nip_ppk'];
$nama_ppb = $_POST['nama_ppb'];
$nip_ppb = $_POST['nip_ppb'];
$tahun = $_POST['tahun'];
$nama_perusahaan=$_POST['nama_perusahaan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$direktur_perusahaan=$_POST['direktur_perusahaan'];
$npwp_perusahaan=$_POST['npwp_perusahaan'];
//start variabel persurat
$nomor_pph=$_POST['nomor_pph'];
$tanggal_pph=$pengaturan->formatTanggal($_POST['tanggal_pph']);
$tanggal_pph=$pengaturan->formatTanggal($_POST['tanggal_penawaran_pph']);
$tanggal_bappsph=$pengaturan->formatTanggal($_POST['tanggal_bappsph']);
//end variabel persurat
for($i=0;$i<6;$i++){
	$nama_panitia[$i]=$_POST['nama_panitia'.$i];
	$jabatan_panitia[$i]=$_POST['jabatan_panitia'.$i];
}
$total_hps = 0;
$total_penawaran = 0;
$total_spk = 0;
for($i=0;$i<$_POST['banyak_barang'];$i++){
	echo $nama_barang[$i]=$_POST['nama_barang'.$i];
	echo $volume[$i]=$_POST['volume'.$i];
	echo $satuan[$i]=$_POST['satuan'.$i];
	echo $spesifikasi[$i]=$_POST['spesifikasi'.$i];
	echo $harga_dasar_hps[$i]=$_POST['harga_dasar_hps'.$i];
	echo $harga_dasar_penawaran[$i]=$_POST['harga_dasar_penawaran'.$i];
	echo $harga_dasar_spk[$i]=$_POST['harga_dasar_spk'.$i];
	echo $keuntungan_hps[$i]=$_POST['keuntungan_hps'.$i];
	echo $keuntungan_penawaran[$i]=$_POST['keuntungan_penawaran'.$i];
	echo $keuntungan_spk[$i]=$_POST['keuntungan_spk'.$i];
	echo $jumlah_keuntungan_hps[$i]=$_POST['jumlah_keuntungan_hps'.$i];
	echo $jumlah_keuntungan_penawaran[$i]=$_POST['jumlah_keuntungan_penawaran'.$i];
	echo $jumlah_keuntungan_spk[$i]=$_POST['jumlah_keuntungan_spk'.$i];
	echo $ppn_hps[$i]=$_POST['ppn_hps'.$i];
	echo $ppn_penawaran[$i]=$_POST['ppn_penawaran'.$i];
	echo $ppn_spk[$i]=$_POST['ppn_spk'.$i];
	echo $hps_hps[$i]=$_POST['hps_hps'.$i];
	echo $hps_penawaran[$i]=$_POST['hps_penawaran'.$i];
	echo $hps_spk[$i]=$_POST['hps_spk'.$i];
	echo $total_harga_hps[$i]=$_POST['total_harga_hps'.$i];
	echo $total_harga_penawaran[$i]=$_POST['total_harga_penawaran'.$i];
	echo $total_harga_spk[$i]=$_POST['total_harga_spk'.$i];
	$total_hps+=$total_harga_hps[$i];
	$total_penawaran+=$total_harga_penawaran[$i];
	$total_spk+=$total_harga_spk[$i];

}


//format yang akan di proses menjadi dokumen word .docx
	include '../../class/surat_pt/class-surat_pt.php';
	$surat_pt = new kelolaSuratPT();
	include 'surat_pt/surat_ph/surat_ph_docx.php';

// Save file / download file
ob_end_clean();
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename=1.Surat Kontrak-'.$judul.'-'.$tahun.'.docx');
header('Cache-Control: max-age=0');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');

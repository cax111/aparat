<?php
//pemanggilan library yang diperlukan

use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\Paragraph;

include_once '../../vendor/autoload.php';
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
$tipe_pagu = $_POST['tipe_pagu'];
$nama_perusahaan=$_POST['nama_perusahaan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$direktur_perusahaan=$_POST['direktur_perusahaan'];
$npwp_perusahaan=$_POST['npwp_perusahaan'];
$telp_perusahaan=$_POST['telp_perusahaan'];
$email_perusahaan=$_POST['email_perusahaan'];
//start variabel persurat
$nomor_oe = $_POST['nomor_oe'];
$tanggal_oe=$pengaturan->formatTanggal($_POST['tanggal_oe']);
$nomor_pph=$_POST['nomor_pph'];
$tanggal_pph=$pengaturan->formatTanggal($_POST['tanggal_pph']);
$tanggal_penawaran_pph=$pengaturan->formatTanggal($_POST['tanggal_penawaran_pph']);
$nomor_bappsph=$_POST['nomor_bappsph'];
$tanggal_bappsph=$pengaturan->formatTanggal($_POST['tanggal_bappsph']);
$waktu_pengerjaan_bappsph=$_POST['waktu_pengerjaan_bappsph'];
$waktu_ppsph = $_POST['waktu_ppsph'];
$nomor_bapph = $_POST['nomor_bapph'];
$tanggal_bapph = $_POST['tanggal_bapph'];
$hari_bapph = $_POST['hari_bapph'];
$nomor_uknh = $_POST['nomor_uknh'];
$tanggal_uknh = $_POST['tanggal_uknh'];
$waktu_uknh = $_POST['waktu_uknh'];
$nomor_baknh = $_POST['nomor_baknh'];
$tanggal_baknh = $_POST['tanggal_baknh'];
$nomor_bahpl = $_POST['nomor_bahpl'];
$tanggal_bahpl = $_POST['tanggal_bahpl'];
$nomor_pp = $_POST['nomor_pp'];
$tanggal_pp = $_POST['tanggal_pp'];
$tanggal_spk_pp = $_POST['tanggal_spk_pp'];
$waktu_pp = $_POST['waktu_pp'];
$nomor_bapp = $_POST['nomor_bapp'];
$nomor_spk = $_POST['nomor_spk'];
$tanggal_spk = $_POST['tanggal_spk'];
$nomor_sp = $_POST['nomor_sp'];
$nomor_bapb = $_POST['nomor_bapb'];
$nomor_bastb = $_POST['nomor_bastb'];
$nomor_bap = $_POST['nomor_bap'];
$nomor_ph = $_POST['nomor_ph'];
//end variabel persurat
for($i=0;$i<6;$i++){
	$nama_panitia[$i]=$_POST['nama_panitia'.$i];
	$jabatan_panitia[$i]=$_POST['jabatan_panitia'.$i];
}
$nip_panitia=$_POST['nama_panitia6'];

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
if($_POST['tipe_download']=="kontrak"){
	include '../../class/surat_kontrak/class-surat_kontrak.php';
	$surat_kontrak = new kelolaSuratKontrak();

	include 'surat_kontrak/surat_oe/surat_oe_docx.php';
	include 'surat_kontrak/surat_pph/surat_pph_docx.php';
	include 'surat_kontrak/surat_bappsph/surat_bappsph_docx.php';
	//include 'surat_kontrak/surat_ppsph/surat_ppsph_docx.php';
	include 'surat_kontrak/surat_bapph/surat_bapph_docx.php';
	include 'surat_kontrak/surat_uknh/surat_uknh_docx.php';
	include 'surat_kontrak/surat_baknh/surat_baknh_docx.php';
	include 'surat_kontrak/surat_baknh/surat_lbaknh_docx.php';
	//include 'surat_kontrak/surat_baknh/surat_lhknh_docx.php';
	//include 'surat_kontrak/surat_baknh/surat_knh_docx.php';
	include 'surat_kontrak/surat_bahpl/surat_bahpl_docx.php';
	include 'surat_kontrak/surat_pp/surat_pp_docx.php';
	include 'surat_kontrak/surat_bapp/surat_bapp_docx.php';
	include 'surat_kontrak/surat_spk/surat_spk_docx.php';
	include 'surat_kontrak/surat_spk/surat_lspk_docx.php';
	include 'surat_kontrak/surat_sp/surat_sp_docx.php';
	include 'surat_kontrak/surat_bapb/surat_bapb_docx.php';
	include 'surat_kontrak/surat_bastb/surat_bastb_docx.php';
	include 'surat_kontrak/surat_bap/surat_bap_docx.php';
	include 'surat_kontrak/kwitansi/kwitansi_docx.php';
}

// Save file / download file
ob_end_clean();
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename=1.Surat Kontrak-'.$judul.'-'.$tahun.'.docx');
header('Cache-Control: max-age=0');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');

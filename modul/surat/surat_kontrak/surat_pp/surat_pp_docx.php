<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set paragraf
$judulParagrafStyle = 'judulStyleBAKNH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyleBAKNH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StyleBAKNH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));

//mulai isi word -- 

//tambahkan tabel

$fancyTableStyleName = 'Fancy TablePPHHeader';
$fancyTableStyle = array('cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::END, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'top');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>6, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$a = $table->addCell(6000, $VAlignCellStyle);
$a->addText("Nomor \t\t: $nomor_pp", $fontStyleName, $isiParagrafStyle);
$a->addText("Lampiran \t: -", $fontStyleName, $isiParagrafStyle);
$a->addText("Perihal \t\t: Penetapan Penyedia ", $fontStyleName, $isiParagrafStyle);
$a->addText("", $fontStyleName, $isiParagrafStyle);
$b = $table->addCell(null, $VAlignCellStyle);
$b->addText("Bandung, ".$pengaturan->formatTanggal($tanggal_pp), $fontStyleName, $isiParagrafStyle);
$b->addText("", $fontStyleName, $isiParagrafStyle);
$b->addText("", $fontStyleName, $isiParagrafStyle);
$b->addText("", $fontStyleName, $isiParagrafStyle);
$b->addText("Kepada Yth.", $fontStyleName, $isiParagrafStyle);
$b->addText("Direktur $nama_perusahaan", $boldFontStyleName, $isiParagrafStyle);
$b->addText("$alamat_perusahaan", $boldFontStyleName, $isiParagrafStyle);

//isi word
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("Assalamu'alaikum Wr. Wb.,", $IFontStyleName, $isiParagrafStyle3);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
	$section->addText("\tBerdasarkan Berita Acara Klarifikasi dan Negosiasi Harga Nomor : ".$nomor_baknh.", tanggal ".$pengaturan->formatTanggal($tanggal_baknh)." tentang penawaran harga Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun, selanjutnya kami menunjuk $nama_perusahaan yang saudara pimpin untuk melaksanakan pekerjaan sebagaimana dimaksud.", $fontStyleName, $isiParagrafStyle3);
	$section->addText("", $IFontStyleName, $isiParagrafStyle);
	$section->addText("", $IFontStyleName, $isiParagrafStyle);
	$section->addText("\tKeterangan lebih terperinci akan kami jelaskan dalam Surat Perjanjian Kerjasama (Kontrak) pada tanggal ".$pengaturan->formatTanggal($tanggal_spk_pp).", bertempat di gedung $nama_jurusan UIN Sunan Gunung Djati Bandung, $alamat_universitas, Pukul $waktu_pp WIB sampai dengan selesai. ", $fontStyleName,$isiParagrafStyle3);
	$section->addText("", $IFontStyleName, $isiParagrafStyle);
}else{
	$section->addText("\tBerdasarkan Berita Acara Klarifikasi dan Negosiasi Harga Nomor : ".$nomor_baknh.", tanggal ".$pengaturan->formatTanggal($tanggal_baknh)." tentang penawaran harga Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun, selanjutnya kami menunjuk $nama_perusahaan yang saudara pimpin untuk melaksanakan pekerjaan sebagaimana dimaksud.", $fontStyleName, $isiParagrafStyle3);
	$section->addText("", $IFontStyleName, $isiParagrafStyle);
	$section->addText("", $IFontStyleName, $isiParagrafStyle);
	$section->addText("\tKeterangan lebih terperinci akan kami jelaskan dalam Surat Perjanjian Kerjasama (Kontrak) pada tanggal ".$pengaturan->formatTanggal($tanggal_spk_pp).", bertempat di gedung Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung, $alamat_universitas, Pukul $waktu_pp WIB sampai dengan selesai. ", $fontStyleName,$isiParagrafStyle3);
	$section->addText("", $IFontStyleName, $isiParagrafStyle);
}
$section->addText("Demikian atas perhatian dan kerjasama yang baik, kami haturkan terima kasih.", $fontStyleName, $isiParagrafStyle3);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);

$section->addText("Wassalamu'alaikum Wr. Wb.", $IFontStyleName, $isiParagrafStyle3);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);

$section->addText("\t\t\t\t\t\t\t\t\tPokja Pengadaan Barang/Jasa", $fontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText("\t\t\t\t\t\t\t\t\t$nama_jurusan", $fontStyleName, $isiParagrafStyle);
}else{
    $section->addText("\t\t\t\t\t\t\t\t\tFakultas $nama_fakultas", $fontStyleName, $isiParagrafStyle);
}
$section->addText("\t\t\t\t\t\t\t\t\tUIN Sunan Gunung Djati Bandung", $fontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\t\tKetua,", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t\t\t $nama_ppb";
$textRun = $section->createTextRun($isiParagrafStyle);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\tNIP. $nip_ppb", $fontStyleName, $isiParagrafStyle);
?>
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
$section->addText("Nomor \t\t: $nomor_pp \t\t\tBandung, ".$pengaturan->formatTanggal($tanggal_pp), $fontStyleName, $isiParagrafStyle);
$section->addText("Lampiran \t: -", $fontStyleName, $isiParagrafStyle);
$section->addText("Perihal \t\t: Penetapan Penyedia ", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);

$section->addText("\t\t\t\t\t\t\t\t\tKepada Yth.", $fontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\t\tDirektur $nama_perusahaan", $boldFontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\t\t$alamat_perusahaan", $boldFontStyleName, $isiParagrafStyle);

//isi word
$section->addText("Assalamu'alaikum Wr. Wb.,", $IFontStyleName, $isiParagrafStyle);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("\tBerdasarkan Berita Acara Klarifikasi dan Negosiasi Harga Nomor : ".$nomor_baknh.", tanggal ".$pengaturan->formatTanggal($tanggal_pp)." tentang penawaran harga Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun, selanjutnya kami menunjuk $nama_perusahaan yang saudara pimpin untuk melaksanakan pekerjaan sebagaimana dimaksud.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("\tKeterangan lebih terperinci akan kami jelaskan dalam Surat Perjanjian Kerjasama (Kontrak) pada tanggal ".$tanggal_spk_pp.", bertempat di gedung Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung, $alamat_universitas, Pukul $waktu_pp WIB sampai dengan selesai. ", $fontStyleName,$isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle);

$section->addText("Demikian atas perhatian dan kerjasama yang baik, kami haturkan terima kasih.", $fontStyleName, $isiParagrafStyle);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);

$section->addText("Wassalamu'alaikum Wr. Wb.", $IFontStyleName, $isiParagrafStyle);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);

$section->addText("\t\t\t\t\t\t\t\t\tPokja Pengadaan Barang/Jasa", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t\t\t $nama_ppb";
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\tNIP. $nip_ppb", $fontStyleName, $isiParagrafStyle2);
?>
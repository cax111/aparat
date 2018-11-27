<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 1500, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$JudulFontStyleName = 'Judulkwitansi'; 
$phpWord->addFontStyle($JudulFontStyleName, array('name' => 'Times New Roman','size' => 26,'bold' => true,'italic' => true));
$norekFontStyleName = 'norekkwitansi'; 
$phpWord->addFontStyle($norekFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'italic' => true,'bgColor' => '#c0c0c0'));
$fontStyleName = 'textkwitansi'; 
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 12,'italic' => true));
$ttdFontStyleName = 'ttdkwitansi'; 
$phpWord->addFontStyle($ttdFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true, 'underline' => 'single'));
$font2StyleName = 'text2kwitansi'; 
$phpWord->addFontStyle($font2StyleName, array('name' => 'Times New Roman','size' => 12));

//set paragraf
$judulParagrafStyle = 'judulStylekwitansi';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));
$listTTDBAPPH = 'ttd_bapph';
$phpWord->addParagraphStyle($listTTDBAPPH, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceBefore' => 4, 'line-height' => 2));

//mulai isi word -- 

$section->addText("Kwitansi", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("Nomor\t : ", $fontStyleName, $isiParagrafStyle);
$section->addText("NPWP\t : $npwp_perusahaan".$npwp, $fontStyleName, $isiParagrafStyle);
$section->addText($nama_perusahaan, $fontStyleName, $isiParagrafStyle);
$section->addText("No Rek. BRI. 0354-01-000890-56-1", $norekFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);

//tambahkan tabel
$fancyTableStyleName = 'kwitansi';
$fancyTableStyle = array('cellMargin' => 0, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');	
$fontStyle = array('size'=>12, 'name'=>'Times New Roman', 'italic'=>true);
$font2Style = array('size'=>12, 'name'=>'Times New Roman', 'bold'=>true, 'italic'=>true,'bgColor' => '#c0c0c0');
$font3Style = array('size'=>12, 'name'=>'Times New Roman', 'bold'=>true, 'italic'=>true,'bgColor' => '#c0c0c0');
$font4Style = array('size'=>12, 'name'=>'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(2400, $VAlignCellStyleTop)->addText("Sudah Terima dari ", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$isi = $table->addCell(null, $VAlignCellStyle);
$isi->addText("Kuasa Pengguna Anggaran (KPA) UIN Sunan Gunung Djati Bandung ", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$table->addCell(2400, $VAlignCellStyleTop)->addText("Uang Sebesar ", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$isi = $table->addCell(null, $VAlignCellStyle);
$isi->addText($pengaturan->penyebut($total_spk)." Rupiah", $font2Style,array('spaceAfter' => 0));
$table->addRow();
$table->addCell(2400, $VAlignCellStyleTop)->addText("Untuk Pembayaran ", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$isi = $table->addCell(null, $VAlignCellStyle);
$isi->addText("Pekerjaan ".$judul." Jurusan ".$nama_jurusan." Fakultas ".$nama_fakultas." ".$universitas." tahun ".$tahun.". Berdasarkan Surat Perintah Kerja (Kontrak) Nomor: ".$nomor_spk." tanggal ".$pengaturan->formatTanggal($tanggal_spk)." dan Berita Acara Serah Terima Barang Nomor: ".$nomor_bastb." tanggal ".$pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)), $font4Style,array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => 0));
$table->addRow();
$table->addCell(2400, $VAlignCellStyleTop)->addText("Terbilang ", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$isi = $table->addCell(null, $VAlignCellStyle);
$isi->addText(" Rp.".$pengaturan->formatUang($total_spk).".- ", $font3Style,array('spaceAfter' => 0));

$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\tBandung, ".$pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)), $fontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\tHormat Kami,", $fontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$textRun = $section->createTextRun($isiParagrafStyle);
$textRun->addText("\t\t\t\t\t\t\t\t", $font2StyleName);
$textRun->addText("$direktur_perusahaan", $ttdFontStyleName);
$section->addText("\t\t\t\t\t\t\t\tDirektur",$font2StyleName,$isiParagrafStyle);

$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("       Setuju dibayar", $font2StyleName, $isiParagrafStyle);
$section->addText("An. Kuasa Pengguna Anggaran", $font2StyleName, $isiParagrafStyle);
$section->addText("       Pejabat Pembuat Komitmen, ", $font2StyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$section->addText("", $JudulFontStyleName, $isiParagrafStyle);
$textRun = $section->createTextRun($isiParagrafStyle);
$textRun->addText("       ", $font2StyleName);
$textRun->addText("$nama_ppk", $ttdFontStyleName);
$section->addText("       NIP. $nip_ppk",$font2StyleName,$isiParagrafStyle);
?>
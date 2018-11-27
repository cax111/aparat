<?php
// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'orientation' => 'landscape', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>710, 'marginBottom' => 710)
);
$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(11);
//set font
$boldFontStyleName = 'BoldText'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true));
$fontStyleName = 'Judul'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 12));
$UFontStyleName = 'UnderlineText'; //underline
$phpWord->addFontStyle($UFontStyleName, array('name' => 'Times New Roman','size' => 12,'underline' => 'single'));
$boldUFontStyleName = 'BoldUText'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldIText';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'italic' => true));
$IFontStyleName = 'IText';//italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 12,'italic' => true));

//set paragraf
$judulParagrafStyle = 'judulStyle';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//judul word
$section->addText('', $fontStyleName, $isiParagrafStyle);
$section->addText('', $fontStyleName, $isiParagrafStyle);
$section->addText('', $fontStyleName, $isiParagrafStyle);
$section->addText('', $fontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
	$section->addText(strtoupper("Uraian Kegiatan Pekerjaan $judul $nama_jurusan"), $boldFontStyleName, $judulParagrafStyle);
	$section->addText(' UIN SUNAN GUNUNG DJATI BANDUNG TAHUN '.$tahun, $boldFontStyleName, $judulParagrafStyle);
}else{
	$section->addText(strtoupper("Uraian Kegiatan Pekerjaan $judul Jurusan $nama_jurusan"), $boldFontStyleName, $judulParagrafStyle);
	$section->addText('FAKULTAS '.strtoupper($nama_fakultas).' UIN SUNAN GUNUNG DJATI BANDUNG TAHUN '.$tahun, $boldFontStyleName, $judulParagrafStyle);
}
//isi word
$section->addText('', $fontStyleName, $isiParagrafStyle);
//tambahkan tabel
$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('No',$fontStyle,array('spaceAfter' => 0,'align' => 'center', 'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Nama Surat',$fontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(2000,$VAlignCellStyle)->addText('Nomor Surat',$fontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText('tanggal Surat',$fontStyle,array('spaceAfter' => 0, 'align' => 'center'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('1',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Penawaran Langsung dan Permintaan Penawaran Harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_pph,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($tanggal_pph,$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('2',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita acara pemasukan/penawaran surat penawaran harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bappsph,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($tanggal_bappsph,$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('3',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Lamp. Berita acara pemasukan/penawaran surat penawaran harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bappsph,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($tanggal_bappsph,$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('4',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita acara penelitian penawaran harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bapph,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_bapph),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('5',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Undangan Klarifikasi dan negosasi harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_uknh,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_uknh),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('6',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita Acara Klarifikasi dan negosasi harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_baknh,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_baknh),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('7',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Lampiran Berita Acara Klarifikasi dan negosasi harga',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_baknh,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_baknh),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('8',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita acara hasil pengadaan langsung',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bahpl,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_baknh),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('9',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Penetapan Penyedia',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_pp,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_pp),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('10',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita acara pengumuman penyedia',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bapp,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_pp),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('11',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Surat perintah kerja',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_spk,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_spk),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('12',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Lampiran Surat perintah kerja',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_spk,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_spk),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('13',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Surat pesanan',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_sp,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($tanggal_spk),$fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
 
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('14',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita acara pemeriksaan barang',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bapb,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)),$fontStyle,array('spaceAfter' => 0,'align' => 'right'));
 
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('15',$fontStyle,array('spaceAfter' => 0,'align' => 'center'));
$table->addCell(8000,$VAlignCellStyle)->addText('Berita acara serah terima barang',$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($nomor_bastb,$fontStyle,array('spaceAfter' => 0));
$table->addCell(null,$VAlignCellStyle)->addText($pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)),$fontStyle,array('spaceAfter' => 0,'align' => 'right'));
 
//end tabel
?>
<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 1060, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextPH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true));
$fontStyleName = 'JudulPH'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 12));
$boldUFontStyleName = 'BoldUTextPH'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldITextPH';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'italic' => true));
$IFontStyleName = 'ITextPH';//italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 12,'italic' => true));
$UIFontStyleName = 'UITextPH';//Underline italic
$phpWord->addFontStyle($UIFontStyleName, array('name' => 'Times New Roman','size' => 30,'italic' => true,'underline' => 'single'));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStylePH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StylePH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));

//mulai isi word -- 
$section->addText("\t\t\t\t\t\t\t\t\t\t\t ".$pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)), $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("Faktur", $UIFontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);

$section->addText("Kepada Yth.", $fontStyleName, $isiParagrafStyle);
$section->addText("Pejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText("$nama_jurusan UIN Sunan Gunung Djati", $fontStyleName, $isiParagrafStyle);
}else{
    $section->addText("Fakultas $nama_fakultas UIN Sunan Gunung Djati", $fontStyleName, $isiParagrafStyle);
}
$section->addText("di", $fontStyleName, $isiParagrafStyle);
$section->addText("Bandung", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//isi word
if($nama_fakultas=="lain-lain"){
	$section->addText("\tPekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung tahun $tahun, dengan perincian sebagai berikut:", $fontStyleName, $isiParagrafStyle2);
}else{
	$section->addText("\tPekerjaan $judul jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung tahun $tahun, dengan perincian sebagai berikut:", $fontStyleName, $isiParagrafStyle2);
}
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
//tambahkan tabel

$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>6, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(400);
$table->addCell(null,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(6000,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(400,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Harga Dasar',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jumlah Harga(Rp)',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(3500);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(400)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($satuan[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($pengaturan->formatUang($harga_dasar_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($total_harga_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));

}
$total_hps=0;
for($i=0;$i<$_POST['banyak_barang'];$i++){
	$total_hps += $total_harga_hps[$i];
}    
$table->addRow();
$table->addCell(null,array('gridSpan' => 5))->addText("Total", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText("Rp.".$pengaturan->formatUang($total_hps), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));

//end tabel

$section->addText("");

$pisahin = "Terbilang : (".$pengaturan->penyebut($total_hps)."Rupiah )";
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ", $pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i<3){
		$textRun->addText($pisah[$i]." ", $fontStyleName);
	}else{
		$textRun->addText($pisah[$i]." ", $IFontStyleName);
	}
}

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\t\t\t Hormat Kami", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t\t\t\t\t ($direktur_perusahaan)";
$textRun = $section->createTextRun($isiParagrafStyle);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\t\t\t Direktur", $fontStyleName, $isiParagrafStyle2);
?>
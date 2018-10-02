<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set paragraf
$judulParagrafStyle = 'judulStylePPSPH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//mulai isi word -- 

$section->addText("\tFAKULTAS ".strtoupper($nama_fakultas), $boldFontStyleName, $isiParagrafStyle2);
$pisah = explode(' ',$nama_universitas);
$namaUniv = strtoupper("\t$pisah[0] $pisah[1] $pisah[2]");
$namaUniv2 = strtoupper("\t$pisah[3] $pisah[4] $pisah[5] BANDUNG");
$section->addText($namaUniv, $boldFontStyleName, $isiParagrafStyle2);
$section->addText($namaUniv2, $boldFontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText("\tDAFTAR HADIR", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("\tRapat\t\t: Klarifikasi dan Negoisasi Harga", $fontStyleName, $isiParagrafStyle2);
$section->addText("\tHari\t\t: ".$pengaturan->tanggalToNamaHari($tanggal_baknh), $fontStyleName, $isiParagrafStyle2);
$section->addText("\tTanggal\t: ".$pengaturan->formatTanggal($tanggal_baknh), $fontStyleName, $isiParagrafStyle2);
$section->addText("\tPukul\t\t: Pukul ".$waktu_uknh." s/d selesai", $fontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
//tambahkan tabel

$fancyTableStyleName = 'header PPSPH';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$TfontStyle = array('size'=>11, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(300,$VAlignCellStyle)->addText("No.", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText("Nama", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(2500,$VAlignCellStyle)->addText("Jabatan", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(2500,$VAlignCellStyle)->addText("Tanda Tangan", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for($i=0;$i<3;$i++){
    $table->addRow();
    $table->addCell(300,$VAlignCellStyle)->addText($i+1, $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(3000,$VAlignCellStyle)->addText($nama_panitia[$i], $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(2500,$VAlignCellStyle)->addText($jabatan_panitia[$i], $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(2500,$VAlignCellStyle)->addText("", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
}
//end tabel

$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\tPokja Pengadaan Barang/Jasa", $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
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
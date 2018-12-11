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
$STFontStyleName = 'STTextPH';//Spesifikasi Teknis
$phpWord->addFontStyle($STFontStyleName, array('name' => 'Times New Roman','size' => 8));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStylePH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StylePH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));

//mulai isi word -- 
$section->addText("SPESIFIKASI TEKNIS PEKERJAAN ".strtoupper($judul), $boldFontStyleName, $judulParagrafStyle);
if($nama_fakultas=="lain-lain"){
$section->addText(strtoupper($nama_jurusan), $boldFontStyleName, $judulParagrafStyle);
}else{
$section->addText("JURUSAN ".strtoupper($nama_jurusan)." FAKULTAS ".strtoupper($nama_fakultas), $boldFontStyleName, $judulParagrafStyle);
}
$section->addText("UIN SUNAN GUNUNG DJATI BANDUNG TAHUN ".strtoupper($tahun), $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
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
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(8800,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(8800);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText("Unit", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
}
//end tabel

//list

$section->addText("",$STFontStyleName,$isiParagrafStyle);
$phpWord->addNumberingStyle(
            	'multilevel1',
            	array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)                    
                	)
            	)
        	);
for($i=0;$i<$_POST['banyak_barang'];$i++){
	$section->addListItem("$nama_barang[$i]", 0, $STFontStyleName,'multilevel1');
	$section->addText("Spesifikasi : $spesifikasi[$i]",$STFontStyleName,$isiParagrafStyle);
	$section->addText("Sumber : ".htmlspecialchars($link[$i]),$STFontStyleName,$isiParagrafStyle);
	$section->addImage("../../dist/img/".$gambar[$i], array('width'=>300,'height'=>200));
}
?>
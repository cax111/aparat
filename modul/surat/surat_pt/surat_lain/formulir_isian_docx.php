<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 1060, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextPH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

//mulai isi word -- 
$section->addText("FORMULIR ISIAN PENILAIAN KUALIFIKASI", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("PEKERJAAN ".strtoupper($judul)." JURUSAN ".strtoupper($nama_jurusan), $boldFontStyleName, $judulParagrafStyle);
$section->addText("FAKULTAS ".strtoupper($nama_fakultas), $boldFontStyleName, $judulParagrafStyle);
$section->addText("UIN SUNAN GUNUNG DJATI TAHUN ".$tahun, $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("UIN SUNAN GUNUNG DJATI BANDUNG", $boldFontStyleName, $judulParagrafStyle);
$section->addText("TAHUN ".$tahun, $boldFontStyleName, $judulParagrafStyle);

?>
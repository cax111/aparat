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

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStylePH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StylePH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));

//mulai isi word -- 
$section->addText("SURAT PERNYATAAN", $boldFontStyleName, $judulParagrafStyle);
$section->addText("BUKAN PEGAWAI NEGERI SIPIL/ ANGGOTA TNI/ POLRI", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);

$section->addText("Yang bertanda tangan dibawah ini : ", $fontStyleName, $isiParagrafStyle);
$section->addText("Nama\t\t\t : $direktur_perusahaan", $fontStyleName, $isiParagrafStyle);
$section->addText("Jabatan\t\t : Direktur", $fontStyleName, $isiParagrafStyle);
$section->addText("Bertindak untuk dan ", $fontStyleName, $isiParagrafStyle);
$section->addText("atas nama\t\t : $nama_perusahaan", $fontStyleName, $isiParagrafStyle);
$section->addText("alamat\t\t\t : $alamat_perusahaan", $fontStyleName, $isiParagrafStyle);
$section->addText("Telp/Fax\t\t : $telp_perusahaan", $fontStyleName, $isiParagrafStyle);
$section->addText("E-mail\t\t\t : $email_perusahaan", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);

//isi word
$section->addText("Menyatakan dengan sebenarnya bahwa kami adalah bukan seorang Pegawai Negeri Sipil atau Anggota TNI / POLRI.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian Surat Pernyataan ini kami buat dengan sadar dan sebenarnya apabila dikemudian hari, ditemui bahwa surat pernyataan kami ini tidak benar, maka kami bersedia dikenakan sanksi sesuai ketentuan peraturan Perundang-undangan yang berlaku.", $fontStyleName, $isiParagrafStyle2);

$section->addText("", $IFontStyleName, $isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\t\t Bandung, $tanggal_penawaran_pph", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\t\t $nama_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\t\t\t matrai", $IFontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t\t\t\t ($direktur_perusahaan)";
$textRun = $section->createTextRun($isiParagrafStyle);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\t\t Direktur", $fontStyleName, $isiParagrafStyle2);
?>
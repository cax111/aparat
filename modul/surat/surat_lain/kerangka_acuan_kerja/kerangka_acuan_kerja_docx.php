<?php
// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextPH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true));
$fontStyleName = 'TextPH'; //NORMAL
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 12));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$paragrafStyle = 'stylePH';
$phpWord->addParagraphStyle($paragrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//mulai isi word -- 
$section->addText("KERANGKA ACUAN KERJA", $boldFontStyleName, $judulParagrafStyle);
$section->addText("(TERMS OF REFERENCE)", $boldFontStyleName, $judulParagrafStyle);
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
$section->addImage("../../dist/img/logo-uin.jpg", array('width'=>150,'height'=>115, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
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


//==================================================================================================//
//==================================================================================================//

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextPH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

$section->addText("KERANGKA ACUAN KERJA", $boldFontStyleName, $judulParagrafStyle);
$section->addText(strtoupper($judul)." JURUSAN ".strtoupper($nama_jurusan), $boldFontStyleName, $judulParagrafStyle);
$section->addText("FAKULTAS ".strtoupper($nama_fakultas), $boldFontStyleName, $judulParagrafStyle);
$section->addText("UIN SUNAN GUNUNG DJATI BANDUNG", $boldFontStyleName, $judulParagrafStyle);

//list
$phpWord->addNumberingStyle(
            	'multilevel',
            	array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)                    
                	)
            	)
        	);
$section->addListItem('LATAR BELAKANG', 0, $boldFontStyleName,'multilevel');
$section->addText("Pembangunan sarana dan prasarana diperlukan dalam menunjang seluruh kegiatan yang ada dalam sebuah institusi, salah satunya adalah Jurusan Informatika Fakultas Sains dan Teknologi. Dimana alat alat yang ada kurang optimal dikarenaka pemakaian alat khusunya komputer yang tarus menerus. Hal ini tentu akan berpengaruh dalam proses pembelajaran dikelas. Maka dari itu pemeliharaan kebutuhan akan ram, mouse dan keyboard dirasa sangat penting untuk mendukung proses pembelajaran khusus pelayanan terhadap mahasiswa. Atas dasar itu untuk menunjang sarana dan prasarana pengadaan akan ram, mouse dan keyboard diperlukan sebagai bagian perlengkapan untuk menunjang kelancaran dan kesuksesan kegiatan pelayanan ataupun kegiatan belajar.", $fontStyleName, $paragrafStyle);
$section->addListItem('MAKSUD', 0, $boldFontStyleName,'multilevel');
$section->addListItem('TUJUAN', 0, $boldFontStyleName,'multilevel');
$section->addListItem('SASARAN, LOKASI, SUMBER DANA DAN RUANG LINGKUP PEKERJAAN', 0, $boldFontStyleName,'multilevel');
$section->addListItem('NAMA DAN ORGANISASI KUASA PENGGUNA ANGGARAN', 0, $boldFontStyleName,'multilevel');
$section->addText("Jurusan $nama_jurusan Fakultas $nama_fakultas Pejabat Pembuat Komitmen pada UIN Sunan Gunung Djati Bandung.", $fontStyleName, $paragrafStyle);

$section->addListItem('JANGKA WAKTU PENYELESAIAN', 0, $boldFontStyleName,'multilevel');
$section->addListItem('SPESIFIKASI TEKNIS', 0, $boldFontStyleName,'multilevel');
$section->addListItem('PENUTUP', 0, $boldFontStyleName,'multilevel');
$section->addText("Demikian Kerangka Acuan Kerja ini disusun sebagai landasan dalam $judul jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung.", $fontStyleName, $paragrafStyle);
//endlist


?>
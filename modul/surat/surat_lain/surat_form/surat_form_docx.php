<?php
// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(12);
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
$section->addText("UIN SUNAN GUNUNG DJATI BANDUNG", $boldFontStyleName, $judulParagrafStyle);
$section->addText("TAHUN ".$tahun, $boldFontStyleName, $judulParagrafStyle);


//==================================================================================================//
//==================================================================================================//

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 2120, 'marginRight' => 2120, 'marginTop' =>3120, 'marginBottom' => 1120)
);
//set font
$boldFontStyleName = 'BoldTextPH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

$section->addText("FORMULIR ISIAN KUALIFIKASI", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);

$section->addText("Yang bertanda tangan dibawah ini : ", $fontStyleName, $paragrafStyle);
$section->addText("Nama\t\t\t : $direktur_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("Jabatan\t\t : Direktur", $fontStyleName, $paragrafStyle);
$section->addText("Bertindak untuk dan ", $fontStyleName, $paragrafStyle);
$section->addText("atas nama\t\t : $nama_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("alamat\t\t\t : $alamat_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("Telp/Fax\t\t : $telp_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("E-mail\t\t\t : $email_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

//isi word
$section->addText("Menyatakan dengan sesungguhnya bahwa : ", $fontStyleName, $paragrafStyle);

//list
$phpWord->addNumberingStyle(
            	'multilevel',
            	array('type' => 'multilevel', 'levels' => array(
            		array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)                    
                	)
            	)
        	);
$section->addListItem('Saya secara hokum bertindak untuk dan atas nama perusahaan Akte Notaris tanggal 16-Februari-2015 No. 51', 0, $fontStyleName,'multilevel',$paragrafStyle);
$section->addListItem('Saya bukan pegawai K/L/D/I;', 0, $fontStyleName,'multilevel',$paragrafStyle);
$section->addListItem('Saya tidak sedang menjalani sanksi pidana;', 0, $fontStyleName,'multilevel',$paragrafStyle);
$section->addListItem('Saya tidak sedang dan tiadak akan terlibat pertentangan kepentingan dengan para pihak yang terkait, langsung maupun tidak langsung dalam proses pengadaan ini;', 0, $fontStyleName,'multilevel',$paragrafStyle);
$section->addListItem('Badan usaha yang saya miliki tidak masuk dalam daftar hitam, tidak dalam pengawasan pengadilan, tidak pailit atau kegiatan usahanya tidak sedang dihentikan;', 0, $fontStyleName,'multilevel',$paragrafStyle);
$section->addListItem('Salah satu dan/atau semua pengurus badan usaha yang saya wakili tidak masuk dalam daftar hitam,', 0, $fontStyleName,'multilevel',$paragrafStyle);
$section->addListItem('Data data badan usaha yang saya wakili adalah sebagai berikut :', 0, $fontStyleName,'multilevel',$paragrafStyle);

//endlist
$section->addText("");
$section->addText("");
//list
$phpWord->addNumberingStyle(
            	'multilevel1',
            	array('type' => 'multilevel', 'levels' => array(
            		array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'decimal', 'text' => '%2.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'lowerLetter', 'text' => '%3.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                    )
            	)
        	);
$section->addListItem('Data Administrasi', 0, $fontStyleName,'multilevel1');
$section->addListItem('Umum', 1, $fontStyleName,'multilevel1');
$section->addText("Nama Badan Usaha\t\t : $nama_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("Status Badan Usaha\t\t : O Pusat\t O Cabang", $fontStyleName, $paragrafStyle);
$section->addText("Alamat\t\t\t\t : $alamat_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("Telp\t\t\t\t : $telp_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("Fax\t\t\t\t : -", $fontStyleName, $paragrafStyle);
$section->addText("E-mail\t\t\t\t : $email_perusahaan", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('Landasan Hukum Pendirian Perusahaan', 0, $fontStyleName,'multilevel1');
$section->addListItem('Akta Pendirian', 1, $fontStyleName,'multilevel1');
$section->addText('Perusahaan/Anggaran', $fontStyleName, $paragrafStyle);
$section->addText('Dasar', $fontStyleName, $paragrafStyle);
$section->addListItem("Nomor\t\t: ", 2, $fontStyleName,'multilevel1');
$section->addListItem("Tanggal\t\t: ", 2, $fontStyleName,'multilevel1');
$section->addListItem("Nama Notaris\t: ", 2, $fontStyleName,'multilevel1');

$section->addListItem('Pengurus Badan Usaha', 0, $fontStyleName,'multilevel1');
$section->addListItem('Izin Usaha', 0, $fontStyleName,'multilevel1');
$section->addListItem('Data Keuangan', 0, $fontStyleName,'multilevel1');
$section->addListItem('Data Pengalaman Perusahaan', 0, $fontStyleName,'multilevel1');
//endlist

?>
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

$boldUFontStyleName = 'BoldUTextPH'; //boldUnderline
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'underline' => 'single'));

$IFontStyleName = 'ITextPH'; //Italic
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 12,'underline' => 'single'));

//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StylePH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));

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
                    array('format' => 'decimal', 'text' => '%2.', 'left' => 480, 'hanging' => 360, 'tabPos' => 480),
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
$section->addListItem("Nomor\t\t\t: ", 2, $fontStyleName,'multilevel1');
$section->addListItem("Tanggal\t\t: ", 2, $fontStyleName,'multilevel1');
$section->addListItem("Nama Notaris\t\t: ", 2, $fontStyleName,'multilevel1');

$section->addListItem('Pengurus Badan Usaha', 0, $fontStyleName,'multilevel1');

//tambahkan tabel

$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$TfontStyle = array('size'=>10, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('No.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(4500,$VAlignCellStyle)->addText('Nama',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText('No. Identitas',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText('Jabatan dalam Badan Usaha',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('1.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("$direktur_perusahaan",$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('3213180509820002',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Direktur Utama',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('2.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Yuni Kurniati",$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('3273145105860009',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Wakil Direktur',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));

//end tabel

//==================
$section->addListItem('Izin Usaha', 0, $fontStyleName,'multilevel1');

$section->addListItem("No. Surat Usaha\t\t\t : ", 1, $fontStyleName,'multilevel1');
$section->addListItem("Masa Berlaku Izin Usaha\t : ", 1, $fontStyleName,'multilevel1');
$section->addListItem("Instansi Pemberi Izin Usaha\t : ", 1, $fontStyleName,'multilevel1');
//==================

$section->addListItem('Data Keuangan', 0, $fontStyleName,'multilevel1');
$section->addListItem('Susunan Kepemilikan Saham', 1, $fontStyleName,'multilevel1');
//tambahkan tabel
$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$TfontStyle = array('size'=>10, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('No.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(4500,$VAlignCellStyle)->addText('Nama',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText('No. Identitas',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText('Alamat',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3000,$VAlignCellStyle)->addText('Jabatan dalam Perusahaan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('1.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("$direktur_perusahaan",$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('3213180509820002',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("$alamat_perusahaan",$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Direktur Utama',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('2.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Yuni Kurniati",$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('3273145105860009',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jl. Cimuncang No. 14 RT. 002/003 Cibeunying Kidul Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Wakil Direktur',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));

//end tabel
$section->addListItem('Pajak', 1, $fontStyleName,'multilevel1');

$section->addText("", $IFontStyleName, $isiParagrafStyle2);
//==================================
$section->addListItem('Data Pengalaman Perusahaan', 0, $fontStyleName,'multilevel1');
//endlist
//tambahkan tabel
$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellGridStyle = array('valign' => 'center', 'gridSpan' => 2);
$VAlignRowSpanStyle = array('valign' => 'center','vMerge' => 'restart');
$VAlignRowSpanContinueStyle = array('valign' => 'center','vMerge' => 'continue');

$TfontStyle = array('size'=>8, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(null);
$table->addCell(null,$VAlignRowSpanStyle)->addText('No.',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignRowSpanStyle)->addText('Nama Paket Pekerjaan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignRowSpanStyle)->addText('Bidang/Sub Bidang Pekerjaan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignRowSpanStyle)->addText('Lokasi',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellGridStyle)->addText('Pemberian Tugas/Penggunaan Jasa',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellGridStyle)->addText('Kontrak*)',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellGridStyle)->addText('Tanggal Selesai Menurut',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow(null);
$table->addCell(null,$VAlignRowSpanContinueStyle);
$table->addCell(null,$VAlignRowSpanContinueStyle);
$table->addCell(null,$VAlignRowSpanContinueStyle);
$table->addCell(null,$VAlignRowSpanContinueStyle);
$table->addCell(null,$VAlignCellStyle)->addText('Nama ',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Alamat',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('No/Tanggal',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Nilai',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Kontrak',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('BA. Serah Terima Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow(null);
for($i=0;$i<10;$i++){
	$table->addCell(null,$VAlignCellStyle)->addText($i+1,$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
}
$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('1',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Belanja Perangkat Embedded System dan alat laboratorium',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Belanja Perangkat Embedded System dan alat laboratorium',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('UIN Sunan Gunung Djati Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jurusan Informatika Fakultas Sains dan Teknologi',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jl. AH. Nasution No. 105 Cibiru Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('B-1863/Un.05/III.7/PP.00.9/07/2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('44.800.000',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('31 Juli 2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('31 Juli 2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('2',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Pengadaan Belanja Modal Peralatan dan Mesin',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('PC dan Mic Wireless',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('UIN Sunan Gunung Djati Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Fakultas Sains dan Teknologi',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jl. AH. Nasution No. 105 Cibiru Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('B.2758/Un.05/III.7/PP.00.09//07/2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('27.230.000',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('31 Juli 2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('31 Juli 2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));

$table->addRow(null);
$table->addCell(null,$VAlignCellStyle)->addText('3',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Pengadaan Belanja Modal Peralatan dan Mesin',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Pengadaan CCTV',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('UIN Sunan Gunung Djati Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Fakultas Sains dan Teknologi',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jl. AH. Nasution No. 105 Cibiru Bandung',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('B.2415/Un.05/III.7/PP.00.09/10/2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('36.000.000',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('16 Oktober 2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('16 Oktober 2017',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));

//end tabel
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText('Demkian Formulir Isian Kualifikasi ini saya buat dengan sebenarnya dan penuh rasa tanggung jawab. Jika dikemudian hari ditemui bahwa data/dokumen yang saya sampaikan tidak benar da nada pemalsuan, maka saya dan badan usaha yang saya wakili bersedia dikenakan sanksi berupa sanksi administrative, sanksi pencantuman dalam Daftar Hitam, gugatan secara perdata, dan/atau pelaporan secara pidana kepada pihak berwenang sesuai dengan ketentuan peraturan perundang-undangan.', $fontStyleName,$isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t Bandung, $tanggal_penawaran_pph", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t $nama_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t matrai", $IFontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t ($direktur_perusahaan)";
$textRun = $section->createTextRun($isiParagrafStyle);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i]." ", null);
	}else{
		$textRun->addText($pisah[$i], $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t Direktur", $fontStyleName, $isiParagrafStyle2);
//===============================================================================================
//===============================================================================================

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 1060, 'marginRight' => 1060, 'marginTop' =>3120, 'marginBottom' => 710)
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
$section->addText("LEMBAR DATA PENGADAAN (LDP)", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);

//tambahkan tabel

$fancyTableStyleName1 = 'Fancy Table1';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => 'ffffff', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'top');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>7, 'name' => 'Times New Roman');

//TAMBAHKAN LIST

$phpWord->addNumberingStyle(
            	'multilevel2',
            	array('type' => 'multilevel', 'levels' => array(
            		array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'decimal', 'text' => '%2.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'lowerLetter', 'text' => '%3.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                    )
            	)
        	);

$phpWord->addTableStyle($fancyTableStyleName1, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName1);
$table->addRow(null);
$table->addCell(4000,$VAlignCellStyle)->addListItem('LINGKUP PEKERJAAN', 0, $fontStyleName,'multilevel2');
$list = $table->addCell(4000,$VAlignCellStyle);
$list->addListItem("Pejabat Pengadaan Barang / Jasa\n $nama_ppb", 1, $fontStyleName,'multilevel2');
$list->addListItem("Alamat Pejabat Pengadaan Barang / Jasa\n $alamat_universitas", 1, $fontStyleName,'multilevel2');
$list->addListItem("Website : www.uinsgd.ac.id", 1, $fontStyleName,'multilevel2');
$list->addListItem("Nama Paket Pekerjaan\n $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun", 1, $fontStyleName,'multilevel2');
$list->addListItem("Uraian Singkat Pekerjaan\n $judul untuk Jurusan $nama_jurusan Fakultas $nama_fakultas", 1, $fontStyleName,'multilevel2');
$list->addListItem("Jangka waktu penyelesaian pekerjaan : 07 (tujuh) hari kalender.", 1, $fontStyleName,'multilevel2');
$table->addRow(null);
$table->addCell(4000,$VAlignCellStyle)->addListItem('SUMBER DANA', 0, $fontStyleName,'multilevel2');
$table->addCell(4000,$VAlignCellStyle)->addText("Pekerjaan ini dibiayai dari sumber BOPTN UIN Sunan Gunung Djati Bandung Tahun $tahun.", 1, $fontStyleName,'multilevel2');
$table->addRow(null);
$table->addCell(4000,$VAlignCellStyle)->addListItem('MASA BERLAKUNYA PENAWARAN', 0, $fontStyleName,'multilevel2');
$table->addCell(4000,$VAlignCellStyle)->addText("Masa berlaku penawaran : 15 (lima belas) hari kalender", 1, $fontStyleName,'multilevel2');
$table->addRow(null);
$table->addCell(4000,$VAlignCellStyle)->addListItem('DOKUMEN PENAWARAN', 0, $fontStyleName,'multilevel2');
$table->addCell(4000,$VAlignCellStyle)->addText("Bagian pekerjaan yang disubkontrakkan tidak ada.", 1, $fontStyleName,'multilevel2');
$table->addRow(null);
$table->addCell(4000,$VAlignCellStyle)->addListItem('SYARAT PENYEDIA', 0, $fontStyleName,'multilevel2');
$table->addCell(4000,$VAlignCellStyle)->addText("Memiliki izin usaha bidang Meubelair.", 1, $fontStyleName,'multilevel2');


//end tabel


//===============================================================================================
//===============================================================================================

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 1060, 'marginRight' => 1060, 'marginTop' =>3120, 'marginBottom' => 710)
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
$section->addText("SPESIFIKASI TEKNIS DAN GAMBAR", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);

//tambahkan tabel

$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>7, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(400);
$table->addCell(null,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(2500,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(400,$VAlignCellStyle)->addText('Spesifikasi',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Gambar',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($nama_barang[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($spesifikasi[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addImage("../../dist/img/".$gambar[$i], array('width'=>200,'height'=>100));
}
//end tabel

//===============================================================================================
//===============================================================================================

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 1060, 'marginRight' => 1060, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set paragraf
$judulParagrafStyle = 'judulStylePH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStylePH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StylePH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));

//mulai isi word -- 
$section->addText("DAFTAR KUANTITAS DAN HARGA", $boldFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $judulParagrafStyle);

//tambahkan tabel

$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>7, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(400);
$table->addCell(null,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(7500,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(400,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('HPS',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jumlah Harga(Rp)',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(3500);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(400)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($satuan[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($pengaturan->formatUang($hps_spk[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($total_harga_spk[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));

}
$total_spk=0;
for($i=0;$i<$_POST['banyak_barang'];$i++){
	$total_spk += $total_harga_spk[$i];
}    
$table->addRow();
$table->addCell(null,array('gridSpan' => 5))->addText("Total", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText("Rp.".$pengaturan->formatUang($total_spk), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));

//end tabel
?>
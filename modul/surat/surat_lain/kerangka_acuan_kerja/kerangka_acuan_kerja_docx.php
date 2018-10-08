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
$boldUFontStyleName = 'BoldUTextPH'; //bold
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'underline' => 'single'));
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
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),                    
                	array('format' => 'lowerLetter', 'text' => '%2.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)                    
                	)
            	)
        	);
$section->addListItem('LATAR BELAKANG', 0, $boldFontStyleName,'multilevel');
$section->addText("Pembangunan sarana dan prasarana diperlukan dalam menunjang seluruh kegiatan yang ada dalam sebuah institusi, salah satunya adalah Jurusan Informatika Fakultas Sains dan Teknologi. Dimana alat alat yang ada kurang optimal dikarenaka pemakaian alat khusunya komputer yang tarus menerus. Hal ini tentu akan berpengaruh dalam proses pembelajaran dikelas. Maka dari itu pemeliharaan kebutuhan akan ram, mouse dan keyboard dirasa sangat penting untuk mendukung proses pembelajaran khusus pelayanan terhadap mahasiswa. Atas dasar itu untuk menunjang sarana dan prasarana pengadaan akan ram, mouse dan keyboard diperlukan sebagai bagian perlengkapan untuk menunjang kelancaran dan kesuksesan kegiatan pelayanan ataupun kegiatan belajar.", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('MAKSUD', 0, $boldFontStyleName,'multilevel');
$section->addText("Pengadaan ram, mouse dan keyboard pada jurusan $nama_jurusan Fakultas $nama_fakultas Uin Sunan Gunung Djati Bandung.", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('TUJUAN', 0, $boldFontStyleName,'multilevel');
$section->addText("Tersedianya sarana dan prasarana untuk meningkatkan proses pelayanan ataupun belajar oleh mahasiswa.", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('SASARAN, LOKASI, SUMBER DANA DAN RUANG LINGKUP PEKERJAAN', 0, $boldFontStyleName,'multilevel');
$section->addText("Sasaran yang ingin dicapai dalam $judul ini adalah :", $fontStyleName, $paragrafStyle);
$section->addListItem('Terwujudnya kelancaran dan kemudahan dalam pelaksanaan aktifitas dalam bekerja dan belajar.', 1, $boldFontStyleName,'multilevel');
$section->addListItem('Terpenuhinya kebutuhan sarana dan prasana.', 1, $boldFontStyleName,'multilevel');
$section->addListItem('Sumber Pendanaan', 1, $boldFontStyleName,'multilevel');
$section->addText("Sumber pendanaan dalam kegiatan $judul Jurusan $nama_jurusan dan Fakultas $nama_fakultas UIN Sunan Gunung Djati ini adalah BOPTN tahun $tahun. Untuk pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung yaitu maksimal sebesar 16.000.000., terbilang: (Enam Belas Juta Rupiah).", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('NAMA DAN ORGANISASI KUASA PENGGUNA ANGGARAN', 0, $boldFontStyleName,'multilevel');
$section->addText("Jurusan $nama_jurusan Fakultas $nama_fakultas Pejabat Pembuat Komitmen pada UIN Sunan Gunung Djati Bandung.", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('JANGKA WAKTU PENYELESAIAN', 0, $boldFontStyleName,'multilevel');
$section->addText("07 (tujuh) Hari Kalender", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

$section->addListItem('SPESIFIKASI TEKNIS', 0, $boldFontStyleName,'multilevel');
$section->addText("Spesifikasi barang yang akan diadakan dalam pengadaan gorden dilakukan dengan penunjukan langsung terhadap penyedia, hal ini dilakukan dikarenakan barang tidak tersedia dalam https://e-katalog.lkpp.go.id/ dalam hal ini panitia sudah mengkases situs tersebut tanggal $tanggal_oe namun hasilnya barang tidak tersedia. Adapun spesifikasi barang meliputi :", $fontStyleName, $paragrafStyle);
$section->addText("", $fontStyleName, $paragrafStyle);

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
$table->addCell(600,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(8500,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(600,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(3500);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(400)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($satuan[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
} 
//end tabel

$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addListItem('PENUTUP', 0, $boldFontStyleName,'multilevel');
$section->addText("Demikian Kerangka Acuan Kerja ini disusun sebagai landasan dalam $judul jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung.", $fontStyleName, $paragrafStyle);
//endlist

$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\t\tBandung, $tanggal_pph", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\t\tPejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

$pisahin = "\t\t\t\t\t\t\t\t\t\t $nama_ppk";
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\t\tNIP. $nip_ppk", $fontStyleName, $isiParagrafStyle2);
?>
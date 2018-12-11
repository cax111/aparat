<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 1060, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextPPH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));
$fontStyleName = 'JudulPPH'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 11));
$boldUFontStyleName = 'BoldUTextPPH'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldITextPPH';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true,'italic' => true));
$IFontStyleName = 'ITextPPH';//bold&italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 11,'italic' => true));

//set paragraf
$judulParagrafStyle = 'judulStylePPH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStylePPH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StylePPH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5));
$isiParagrafStyle3 = 'isi3StylePPH';
$phpWord->addParagraphStyle($isiParagrafStyle3, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'line-height' => 1.5,'indentation' => array('left' => 1500)));

//mulai isi word --

//tambahkan tabel

$fancyTableStyleName = 'Fancy TablePPHHeader';
$fancyTableStyle = array('cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::END, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'top');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>6, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$a = $table->addCell(6000, $VAlignCellStyle);
$a->addText("Nomor \t\t: $nomor_pph", $fontStyleName, $isiParagrafStyle);
$a->addText("Lampiran \t: -", $fontStyleName, $isiParagrafStyle);
$a->addText("Perihal \t\t: Permintaan Penawaran Harga", $fontStyleName, $isiParagrafStyle);
$a->addText("", $fontStyleName, $isiParagrafStyle);
$b = $table->addCell(null, $VAlignCellStyle);
$b->addText("Bandung, $tanggal_pph", $fontStyleName, $isiParagrafStyle);
$b->addText("", $fontStyleName, $isiParagrafStyle);
$b->addText("", $fontStyleName, $isiParagrafStyle);
$b->addText("", $fontStyleName, $isiParagrafStyle);
$b->addText("Kepada Yth.", $fontStyleName, $isiParagrafStyle);
$b->addText("Direktur $nama_perusahaan", $boldFontStyleName, $isiParagrafStyle);
$b->addText("$alamat_perusahaan", $boldFontStyleName, $isiParagrafStyle);

//isi word
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("Assalamu'alaikum Wr. Wb.", $IFontStyleName, $isiParagrafStyle3);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText("\tMemperhatikan ".$tipe_pagu." UIN Sunan Gunung Djati Bandung Tahun Anggaran $tahun, bersama ini kami mengundang saudara untuk bekerjasama dalam hal Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun.", $fontStyleName, $isiParagrafStyle3);
    $section->addText("\tSebagai bahan pertimbangan saudara, berikut ini uraian daftar kebutuhan Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung tahun $tahun :", $fontStyleName,$isiParagrafStyle3);

}else{
    $section->addText("\tMemperhatikan ".$tipe_pagu." UIN Sunan Gunung Djati Bandung Tahun Anggaran $tahun, bersama ini kami mengundang saudara untuk bekerjasama dalam hal Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun.", $fontStyleName, $isiParagrafStyle3);
    $section->addText("\tSebagai bahan pertimbangan saudara, berikut ini uraian daftar kebutuhan Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung tahun $tahun :", $fontStyleName,$isiParagrafStyle3);

}
$section->addText("", $IFontStyleName, $isiParagrafStyle);

//tambahkan tabel

$fancyTableStyleName = 'Fancy TablePPH';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::END, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>6, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(500, $VAlignCellStyle)->addText('No', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(6500, $VAlignCellStyle)->addText('Nama Barang', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(1000, $VAlignCellStyle)->addText('Vol', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(1000, $VAlignCellStyle)->addText('Satuan', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(500)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(5000);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(1000)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(1000)->addText($satuan[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    /*$text = (0 == $i % 2) ? 'X' : '';
    $table->addCell(500)->addText($text);*/
}
//end tabel
$section->addText("");
$section->addText("Adapun ketentuannya adalah sebagai berikut :", $fontStyleName, $isiParagrafStyle3);

//buat list item number
$phpWord->addNumberingStyle(
            	'multilevel',
            	array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 1900, 'hanging' => 360, 'tabPos' => 1500)                    
                	)
            	)
        	);
$section->addListItem('Penawaran tersebut selambat-lambatnya harus sudah kami terima pada '.$tanggal_penawaran_pph.'.', 0, $fontStyleName,'multilevel');
$section->addListItem('Harga Penawaran sudah termasuk keuntungan perusahaan dan pajak-pajak yang berlaku.', 0, $fontStyleName,'multilevel');
//end list item

$section->addText("\tDemikian penawaran ini kami sampaikan, agar menjadi maklum.", $fontStyleName, $isiParagrafStyle3);
$section->addText("Wassalamu'alaikum Wr. Wb.", $IFontStyleName, $isiParagrafStyle3);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\tPokja Pengadaan Barang/Jasa", $fontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText("\t\t\t\t\t\t\t\t\t$nama_jurusan", $fontStyleName, $isiParagrafStyle);
}else{
    $section->addText("\t\t\t\t\t\t\t\t\tFakultas $nama_fakultas", $fontStyleName, $isiParagrafStyle);
}
$section->addText("\t\t\t\t\t\t\t\t\tUIN Sunan Gunung Djati Bandung", $fontStyleName, $isiParagrafStyle);
$section->addText("\t\t\t\t\t\t\t\t\tKetua,", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t\t\t $nama_ppb";
$textRun = $section->createTextRun($isiParagrafStyle);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\tNIP. $nip_ppb", $fontStyleName, $isiParagrafStyle);
?>
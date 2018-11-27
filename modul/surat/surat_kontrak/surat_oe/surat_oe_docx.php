<?php
// New Word Document
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(11);
//set font
$boldFontStyleName = 'BoldText'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true));
$fontStyleName = 'Judul'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 12));
$UFontStyleName = 'UnderlineText'; //underline
$phpWord->addFontStyle($UFontStyleName, array('name' => 'Times New Roman','size' => 12,'underline' => 'single'));
$boldUFontStyleName = 'BoldUText'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldIText';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true,'italic' => true));
$IFontStyleName = 'IText';//italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 12,'italic' => true));

//set paragraf
$judulParagrafStyle = 'judulStyle';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//judul word
$pisahin = "OWNER ESTIMATE (OE)/HARGA PERKIRAAN SENDIRI (HPS)";
$textRun = $section->createTextRun($judulParagrafStyle);
$pisah = explode(" ",$pisahin);
$x=0;
for($i=0;$i<count($pisah);$i++){
	if($x<2){
		$textRun->addText($pisah[$i]." ", $boldIFontStyleName);
	}else{
		$textRun->addText($pisah[$i]." ", $boldFontStyleName);
	}
	$x++;
}

if($nama_fakultas=="lain-lain"){
	$section->addText(strtoupper($judul).' '.strtoupper($nama_jurusan).' UIN SUNAN GUNUNG DJATI BANDUNG TAHUN '.$tahun, $boldFontStyleName, $judulParagrafStyle);
}else{
	$section->addText(strtoupper($judul).' JURUSAN '.strtoupper($nama_jurusan).' FAKULTAS '.strtoupper($nama_fakultas).' UIN SUNAN GUNUNG DJATI BANDUNG TAHUN '.$tahun, $boldFontStyleName, $judulParagrafStyle);
}
$section->addText('Nomor: '.$nomor_oe, $fontStyleName, $judulParagrafStyle);

//isi word
$section->addText('', $fontStyleName, $judulParagrafStyle);
$section->addText('Yang bertanda tangan dibawah ini :', $fontStyleName, $isiParagrafStyle);
$section->addText('', $fontStyleName, $isiParagrafStyle);

$pisahin = "Nama \t\t : $nama_ppk";
$pisah = explode(" ",$pisahin);
$textRun = $section->createTextRun($isiParagrafStyle);
for($i=0;$i<count($pisah);$i++){
	if($i<3){
		$textRun->addText($pisah[$i]." ", $fontStyleName);
	}else{
		$textRun->addText($pisah[$i]." ", $boldFontStyleName);
	}
}

$section->addText("NIP \t\t : $nip_ppk", $fontStyleName, $isiParagrafStyle);
$section->addText("Jabatan \t : Pejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle);
$section->addText("Alamat \t : $alamat_universitas", $fontStyleName, $isiParagrafStyle);
$section->addText('', $fontStyleName, $isiParagrafStyle);

if($nama_fakultas=="lain-lain"){
	$pisahin = 'Berdasarkan survey harga dan pagu '.$tipe_pagu.' Tahun Anggaran '.$tahun.' untuk Pekerjaan '.$judul.' '.$nama_jurusan.' UIN Sunan Gunung Djati Bandung, telah menetapkan harga perkiraan sendiri untuk Pekerjaan '.$judul.' '.$nama_jurusan.' UIN Sunan Gunung Djati Bandung tahun '.$tahun.', sebesar Rp.'.$pengaturan->formatUang($total_hps).' ('.$pengaturan->penyebut($total_hps).' Rupiah ), dengan rincian sebagai berikut :';
}else{
	$pisahin = 'Berdasarkan survey harga dan pagu '.$tipe_pagu.' Tahun Anggaran '.$tahun.' untuk Pekerjaan '.$judul.' Jurusan '.$nama_jurusan.' Fakultas '.$nama_fakultas.', telah menetapkan harga perkiraan sendiri untuk Pekerjaan '.$judul.' Jurusan '.$nama_jurusan.' Fakultas '.$nama_fakultas.' UIN Sunan Gunung Djati Bandung tahun '.$tahun.', sebesar Rp.'.$pengaturan->formatUang($total_hps).' ('.$pengaturan->penyebut($total_hps).' Rupiah ), dengan rincian sebagai berikut :';
}
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ", $pisahin);
$ambil1=null;
$ambil2=null;
for($i=0;$i<count($pisah);$i++){
	if(substr($pisah[$i],0,1)=="("){
		$ambil1=$i;	
	}elseif(substr($pisah[$i],0,1)==")"){
		$ambil2=$i;
		break;
	}
}
echo $ambil1."\n";
echo $ambil2;
	for($i=0;$i<count($pisah);$i++){
		if($i>=$ambil1 && $i<=$ambil2){
			$textRun->addText($pisah[$i]." ", $IFontStyleName);
		}else{
			$textRun->addText($pisah[$i]." ", $fontStyleName);
		}
	}

$section->addText('', $fontStyleName, $isiParagrafStyle);
$section->addText('', $fontStyleName, $isiParagrafStyle);

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
$table->addCell(3500,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(400,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Harga Dasar',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Keun 10%',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Jumlah',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('PPN 10%',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
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
    $table->addCell(null)->addText($pengaturan->formatUang($harga_dasar_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($keuntungan_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($jumlah_keuntungan_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($ppn_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($hps_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));
    $table->addCell(null)->addText($pengaturan->formatUang($total_harga_hps[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));

}
$total_hps=0;
for($i=0;$i<$_POST['banyak_barang'];$i++){
	$total_hps += $total_harga_hps[$i];
}    
$table->addRow();
$table->addCell(null,array('gridSpan' => 9))->addText("Total", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText("Rp.".$pengaturan->formatUang($total_hps), $fontStyle, array('spaceAfter' => 0, 'align' => 'right'));

//end tabel



//end tabel
$section->addText('', $fontStyleName, $isiParagrafStyle2);

$pisahin = "Terbilang sebesar Rp.".$pengaturan->formatUang($total_hps)." (".$pengaturan->penyebut($total_hps)." Rupiah )";
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ", $pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i<3){
		$textRun->addText($pisah[$i]." ", $fontStyleName);
	}else{
		$textRun->addText($pisah[$i]." ", $IFontStyleName);
	}
}

$section->addText('', $fontStyleName, $isiParagrafStyle2);
if($nama_fakultas=="lain-lain"){
	$section->addText('Demikian harga perkiraan ini dibuat, sebagai kelengkapan proses Pekerjaan '.$judul.' '.$nama_jurusan.' UIN Sunan Gunung Djati Bandung tahun '.$tahun.'.', $fontStyleName, $isiParagrafStyle2);
}else{
	$section->addText('Demikian harga perkiraan ini dibuat, sebagai kelengkapan proses Pekerjaan '.$judul.' Jurusan '.$nama_jurusan.' Fakultas '.$nama_fakultas.' UIN Sunan Gunung Djati Bandung tahun '.$tahun.'.', $fontStyleName, $isiParagrafStyle2);
}
$section->addText('', $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\tBandung, $tanggal_oe", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\tPejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

$pisahin = "\t\t\t\t\t\t\t\t\t $nama_ppk";
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
	if($i==0){
		$textRun->addText($pisah[$i], null);
	}else{
		$textRun->addText($pisah[$i]." ", $boldUFontStyleName);
	}

}
$section->addText("\t\t\t\t\t\t\t\t\tNIP. $nip_ppk", $fontStyleName, $isiParagrafStyle2);
?>
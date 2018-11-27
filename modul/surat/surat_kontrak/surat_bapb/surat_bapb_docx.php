<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$JudulBoldFontStyleName = 'JudulBoldBAPB'; //bold
$phpWord->addFontStyle($JudulBoldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));
$JudulFontStyleName = 'JudulBAPB'; //bold
$phpWord->addFontStyle($JudulFontStyleName, array('name' => 'Times New Roman','size' => 11));
$fontStyleName = 'normalBAPB'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 10));
$IFontStyleName = 'italicBAPB'; //italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 10, 'italic' => true));
$boldFontStyleName = 'boldBAPB'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 10,'bold' => true));

//set paragraf
$judulParagrafStyle = 'judulStyleBAPB';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));
$listTTDBAPPH = 'ttd_bapph';
$phpWord->addParagraphStyle($listTTDBAPPH, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceBefore' => 4, 'line-height' => 2));

//mulai isi word -- 

$section->addText("BERITA ACARA PEMERIKSAAN BARANG", $JudulBoldFontStyleName, $judulParagrafStyle);
$section->addText("Nomor : ".$nomor_bapb, $JudulFontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("Pada hari ini ".$pengaturan->tanggalToNamaHari($pengaturan->penjumlahanTanggal($tanggal_spk,7))." Tanggal ".$pengaturan->formatTanggal2($pengaturan->penjumlahanTanggal($tanggal_spk,7)).", kami yang bertanda tangan di bawah ini:", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
//tambahkan tabel
$fancyTableStyleName = 'PanitiaPHP';
$fancyTableStyle = array('cellMargin' => 0, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');
$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');
//list Panitia
$phpWord->addNumberingStyle(
                'pphp',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$pphp = $table->addCell(null, $VAlignCellStyleTop);
for($i=3;$i<6;$i++){
    $pphp->addListItem("$nama_panitia[$i] ", 0, $fontStyleName,'pphp', $isiParagrafStyle2);
}
$samaDengan = $table->addCell(100, $VAlignCellStyleTop);
for($i=3;$i<6;$i++){
    $samaDengan->addText(" : ", $fontStyle,array('spaceAfter' => 0));
}
$pphp = $table->addCell(null, $VAlignCellStyleTop);
for($i=3;$i<6;$i++){
    $pphp->addText("Panitia Penerima Hasil Kerja", $fontStyleName,array('spaceAfter' => 0));
}
//end tabel
if($nama_fakultas=="lain-lain"){
    $section->addText("",null,$isiParagrafStyle2);
    $section->addText("telah melaksanakan pemeriksaan hasil Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun berdasarkan Surat Perintah Kerja (Kontrak), Nomor: ".$nomor_spk.".",$fontStyleName,$isiParagrafStyle2);
    $section->addText("",null,$isiParagrafStyle2);

    $section->addText("HASIL PEMERIKSAAN ADALAH SEBAGAI BERIKUT", $boldFontStyleName, $judulParagrafStyle);
    $section->addText("",null,$isiParagrafStyle2);
    $section->addText("Hasil Pekerjaan $judul, telah selesai dilaksanakan dalam keadaan 100% baru, kondisi baik dan cukup memuaskan oleh $nama_perusahaan untuk $nama_jurusan UIN Sunan Gunung Djati Bandung dengan perincian sebagai berikut :",$fontStyleName,$isiParagrafStyle2);
    $section->addText("",null,$isiParagrafStyle2);
}else{
    $section->addText("",null,$isiParagrafStyle2);
    $section->addText("telah melaksanakan pemeriksaan hasil Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun berdasarkan Surat Perintah Kerja (Kontrak), Nomor: ".$nomor_spk.".",$fontStyleName,$isiParagrafStyle2);
    $section->addText("",null,$isiParagrafStyle2);

    $section->addText("HASIL PEMERIKSAAN ADALAH SEBAGAI BERIKUT", $boldFontStyleName, $judulParagrafStyle);
    $section->addText("",null,$isiParagrafStyle2);
    $section->addText("Hasil Pekerjaan $judul, telah selesai dilaksanakan dalam keadaan 100% baru, kondisi baik dan cukup memuaskan oleh $nama_perusahaan untuk Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung dengan perincian sebagai berikut :",$fontStyleName,$isiParagrafStyle2);
    $section->addText("",null,$isiParagrafStyle2);
}
//tambahkan tabel
$fancyTableStyleName = 'panitia php';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>8, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>6, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(400);
$table->addCell(1000,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(6500,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(1500,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
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

$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$pisahin = "Berdasarkan hal-hal tersebut di atas, kami menerima barang-barang tersebut diatas dan kami berpendapat bahwa kepada $nama_perusahaan dapat dibayarkan/dilakukan pembayaran sebesar Rp.".$pengaturan->formatUang($total_spk).".- terbilang: (".$pengaturan->penyebut($total_spk)." Rupiah ), termasuk pajak sesuai dengan Surat Perintah Kerja (Kontrak).";
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

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian berita acara ini kami buat sesuai dengan keadaan yang sebenarnya dan untuk digunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');

$fontStyle = array('size'=>10, 'name'=>'Times New Roman');
//list Panitia
$phpWord->addNumberingStyle(
                'pphpTTD',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(5000, $VAlignCellStyleTop)->addText('');
$pphp = $table->addCell(3000, $VAlignCellStyleTop);
$pphp->addText("Bandung, tanggal tersebut di atas", $fontStyle,array('spaceAfter' => 0));  
$pphp->addText("Yang memeriksa,", $fontStyle,array('spaceAfter' => 0));  
$pphp->addText("", $fontStyle,array('spaceAfter' => 0));  
$table->addRow();
$table->addCell(5000, $VAlignCellStyleTop)->addText('');
$pphp = $table->addCell(3000, $VAlignCellStyleTop);
for($i=3;$i<6;$i++){
    $pphp->addListItem("$nama_panitia[$i]", 0, $fontStyleName,'pphpTTD', $isiParagrafStyle2);
    $pphp->addText("", $fontStyle,array('spaceAfter' => 0));
    $pphp->addText("", $fontStyle,array('spaceAfter' => 0));
}
$pphp = $table->addCell(3000, $VAlignCellStyleTop);
for($i=3;$i<6;$i++){
    $pphp->addText("(_______________)", $fontStyle,array('spaceAfter' => 0));
    $pphp->addText("", $fontStyle,array('spaceAfter' => 0));
    $pphp->addText("", $fontStyle,array('spaceAfter' => 0));
}
//end tabel

?>
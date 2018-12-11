<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 1350, 'marginRight' => 1350, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$fontStyleName = 'normalBASTB'; //normalBASTB
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 11));
$boldFontStyleName = 'boldBASTB'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));

//set paragraf
$judulParagrafStyle = 'judulStyleBASTB';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));
$listTTDBAPPH = 'ttd_bapph';
$phpWord->addParagraphStyle($listTTDBAPPH, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceBefore' => 4, 'line-height' => 2));

//mulai isi word -- 

$section->addText("BERITA ACARA SERAH TERIMA BARANG", $boldFontStyleName, $judulParagrafStyle);
$section->addText("Nomor : ".$nomor_bastb, $fontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("Pada hari ini ".$pengaturan->tanggalToNamaHari($pengaturan->penjumlahanTanggal($tanggal_spk,7))." Tanggal ".$pengaturan->formatTanggal2($pengaturan->penjumlahanTanggal($tanggal_spk,7)).", kami yang bertanda tangan di bawah ini:", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//list SerahTerima
$phpWord->addNumberingStyle(
                'serahTerima',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$section->addText("1. Nama\t: $direktur_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("   Jabatan\t: Direktur", $fontStyleName, $isiParagrafStyle2);
//tambahkan tabel
$fancyTableStyleName = 'serahTerima';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');
$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(1430, $VAlignCellStyleTop)->addText("   Alamat\t", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$pihak1 = $table->addCell(null, $VAlignCellStyle);
$pihak1->addText("$alamat_perusahaan", $fontStyle,array('spaceAfter' => 0));
$pihak1->addText("Dalam hal ini bertindak untuk dan atas nama $nama_perusahaan yang selanjutnya disebut PIHAK PERTAMA (I);", $fontStyle,array('spaceAfter' => 0));
//tabel
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("2. Nama\t: $nama_panitia[3]", $fontStyleName, $isiParagrafStyle2);
$section->addText("   Jabatan\t: Panitia Penerima Hasil Kerja", $fontStyleName, $isiParagrafStyle2);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(1430, $VAlignCellStyleTop)->addText("   Alamat\t", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$pihak2 = $table->addCell(null, $VAlignCellStyle);
$pihak2->addText("$alamat_universitas", $fontStyle,array('spaceAfter' => 0));
$pihak2->addText("Dalam hal ini bertindak untuk dan atas Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung yang selanjutnya disebut PIHAK KEDUA (II);", $fontStyle,array('spaceAfter' => 0));
//end List

$section->addText("",null,$isiParagrafStyle2);
$section->addText("Sesuai dengan Surat Perintah Kerja (Kontrak) Nomor:  $nomor_spk tanggal ".$pengaturan->formatTanggal($tanggal_spk)." dan Berita Acara Pemerikasaan Barang/Hasil Pekerjaan Nomor: ".$nomor_bastb." tanggal ".$pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)).", maka PIHAK KESATU pada hari ini dan tanggal tersebut di atas telah menyerahkan barang-barang di bawah ini kepada PIHAK KEDUA, dan PIHAK KEDUA telah menerimanya dengan baik, lengkap dan cukup memuaskan. ",$fontStyleName,$isiParagrafStyle2);
$section->addText("",null,$isiParagrafStyle2);
if($nama_fakultas=="lain-lain"){
    $section->addText("Adapun pekerjaan yang telah diserahterimakan adalah $judul $nama_jurusan UIN Sunan Gunung Djati Bandung, dengan perincian sebagai berikut :",$fontStyleName,$isiParagrafStyle2);
}else{
    $section->addText("Adapun pekerjaan yang telah diserahterimakan adalah $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung, dengan perincian sebagai berikut :",$fontStyleName,$isiParagrafStyle2);
}
$section->addText("",null,$isiParagrafStyle2);

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
$table->addCell(600,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(9000,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(600,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(3500);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(400)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
}    
//end tabel

$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("Demikian berita acara ini dibuat sesuai dengan keadaan yang sebenarnya dan untuk digunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);


//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$pihak2 = $table->addCell(6400, $VAlignCellStyle);
$pihak2->addText("PIHAK PERTAMA (I)", $fontStyle,array('spaceAfter' => 0));
$pihak2->addText("$nama_perusahaan", $fontStyle,array('spaceAfter' => 0));
$pihak1 = $table->addCell(3000, $VAlignCellStyle);
$pihak1->addText("PIHAK KEDUA (II)", $fontStyle,array('spaceAfter' => 0));
$pihak1->addText("Panitia Penerima Hasil Kerja", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$pihak1 = $table->addCell(null);
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("$direktur_perusahaan", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("Direktur", $fontStyle,array('spaceAfter' => 0));
$pihak2 = $table->addCell(null);
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("$nama_panitia[3]", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("NIP. $nip_panitia", $fontStyle,array('spaceAfter' => 0));
//end tabel
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//add list
$phpWord->addNumberingStyle(
                'serahTerimaTTD',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$ttd = $table->addCell(2500, $VAlignCellStyle);
$ttd->addText("Mengetahui,", $fontStyle,array('spaceAfter' => 0));
$ttd->addText("Pejabat Pembuat Komitmen,", $fontStyle,array('spaceAfter' => 0));
$table->addCell(1700, $VAlignCellStyle);
$namaPanitia = $table->addCell(2500);
    $namaPanitia->addText("", $fontStyleName, $isiParagrafStyle2);
    $namaPanitia->addListItem("$nama_panitia[4]", 0, $fontStyleName,'serahTerimaTTD', $isiParagrafStyle2);
$x = $table->addCell(2000);
    $x->addText("", $fontStyleName, $isiParagrafStyle2);
    $x->addText(" (_______________)", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$tppb = $table->addCell(2500);
    $tppb->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("$nama_ppk", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("NIP. $nip_ppk", $fontStyle,array('spaceAfter' => 0));
$table->addCell(1700, $VAlignCellStyle);
$namaPanitia = $table->addCell(2500);
    $namaPanitia->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
    $namaPanitia->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
    $namaPanitia->addListItem("$nama_panitia[5]", 0, $fontStyleName,'serahTerimaTTD', $isiParagrafStyle2);
$x = $table->addCell(2000);
$x->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$x->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$x->addText(" (_______________)", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
//end tabel
?>
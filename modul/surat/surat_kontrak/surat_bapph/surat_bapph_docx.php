<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set paragraf
$judulParagrafStyle = 'judulStyleBAPPH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));
$listTTDBAPPH = 'ttd_bapph';
$phpWord->addParagraphStyle($listTTDBAPPH, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceBefore' => 4, 'line-height' => 2));

//mulai isi word -- 

$section->addText("BERITA ACARA PENELITIAN PENAWARAN HARGA", $boldFontStyleName, $judulParagrafStyle);
$section->addText("Nomor : ".$nomor_bapph, $fontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$isi = "Pada hari ini ".$hari_bapph." tanggal".$pengaturan->formatTanggal2($tanggal_bapph).", kami yang bertanda tangan di bawah ini, Tim Peneliti Penawaran Harga Pekerjaan ".$judul." Jurusan ".$nama_jurusan." Fakultas ".$nama_fakultas." UIN Sunan Gunung Djati Bandung tahun ".$tahun.", telah mengadakan penelitian Penawaran Harga yang diajukan oleh perusahaan/rekanan: ".$nama_perusahaan.".";
$section->addText($isi, $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Yang dihadiri oleh anggota tim peneliti harga : ", $UFontStyleName, $isiParagrafStyle2);
//list panitia
$phpWord->addNumberingStyle(
                'panitia_bapph',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
for($i=0;$i<3;$i++){
    $section->addListItem($nama_panitia[$i], 0, $fontStyleName,'panitia_bapph', $isiParagrafStyle2);
}
//end list panitia
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Ketentuan dan Dasar Evaluasi adalah : ", $UFontStyleName, $isiParagrafStyle2);

//list ketentuan dan dasar evaluasi
$phpWord->addNumberingStyle(
                'dasar_evaluasi',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$section->addListItem("Peraturan Presiden RI No. 54 Tahun 2010 Tentang Pengadaan Barang dan Jasa Pemerintah Beserta Perubahan dan turunannya;", 0, $fontStyleName,'dasar_evaluasi', $isiParagrafStyle2);
$section->addListItem("Peraturan Menteri Keuangan  RI No. 67/PMK.05/Tahun 2013;", 0, $fontStyleName,'dasar_evaluasi', $isiParagrafStyle2);
$section->addListItem("DIPA UIN Sunan Gunung Djati Bandung Tahun 2018 Nomor: SP DIPA-025.04/423523/2018 tanggal 05 Desember 2017;", 0, $fontStyleName,'dasar_evaluasi', $isiParagrafStyle2);
$section->addListItem("Ketentuan harga perkiran sendiri/owner estimate;", 0, $fontStyleName,'dasar_evaluasi', $isiParagrafStyle2);
$section->addListItem("PMK Tentang Standar Biaya Masukan Th. Anggaran 2018.", 0, $fontStyleName,'dasar_evaluasi', $isiParagrafStyle2);
//end list

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Pengajuan harga penawaran dari perusahaan/rekanan :", $UFontStyleName, $isiParagrafStyle2);
$section->addText($nama_perusahaan.", sebesar Rp.".$pengaturan->formatUang($total_penawaran).".- Terbilang (".$pengaturan->penyebut($total_penawaran)."Rupiah)", $fontStyleName, $isiParagrafStyle2);

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Hasil Penelitian/Evaluasi :", $UFontStyleName, $isiParagrafStyle2);
$isi = "Berdasarkan hasil evaluasi yang kami lakukan dan telah memperhatikan ketentuan dan peraturan yang berlaku, kami berpendapat bahwa penawaran dari ".$nama_perusahaan." yang beralamat di ".$alamat_perusahaan.", sebesar Rp.".$pengaturan->formatUang($total_penawaran)." (".$pengaturan->penyebut($total_penawaran)."Rupiah) termasuk pajak, dapat dilakukan negosiasi harga.";
$section->addText($isi, $fontStyleName, $isiParagrafStyle2);

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian berita acara ini kami buat, untuk dipergunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\tTIM PENELITI HARGA,", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
//list panitia
$phpWord->addNumberingStyle(
                'panitia_bapph_ttd',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 4000, 'hanging' => 360, 'tabPos' => 4000)
                    )
                )
            );
/*for($i=0;$i<2;$i++){
    $section->addListItem($nama_panitia[$i]."\t(_________________)", 0, $fontStyleName,'panitia_bapph_ttd', $listTTDBAPPH);
    $section->addText("", 0, $fontStyleName, $isiParagrafStyle2);
} 
    $section->addListItem($nama_panitia[2]."\t\t(_________________)", 0, $fontStyleName,'panitia_bapph_ttd', $listTTDBAPPH);
*/
//end list panitia
$phpWord->addTableStyle('tandaTangan', $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable('tandaTangan');
$table->addRow();
$table->addCell(5000, $VAlignCellStyle)->addText('', $fontStyle,array('spaceAfter' => 0));
$table->addCell(7000, array('gridSpan' => 2))->addText(" ", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$table->addCell(5000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[0]", 0, $fontStyleName,'panitia_bapph_ttd', $listTTDBAPPH);
$table->addCell()->addText("(___________________)", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$table->addCell(5000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[1]", 0, $fontStyleName,'panitia_bapph_ttd', $listTTDBAPPH);
$table->addCell()->addText("(___________________)", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
    $tppb = $table->addCell(5000);
    $tppb->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("", $fontStyle,array('spaceAfter' => 0));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[2]", 0, $fontStyleName,'panitia_bapph_ttd', $listTTDBAPPH);
$table->addCell()->addText("(___________________).", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));

?>
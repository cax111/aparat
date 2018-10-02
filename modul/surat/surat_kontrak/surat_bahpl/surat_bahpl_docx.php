<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextBAHPL'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));
$fontStyleName = 'normalTextBAHPL'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 11));
$UFontStyleName = 'UnderlineTextBAHPL'; //underline
$phpWord->addFontStyle($UFontStyleName, array('name' => 'Times New Roman','size' => 11,'underline' => 'single'));
$boldUFontStyleName = 'BoldUTextBAHPL'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldITextBAHPL';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true,'italic' => true));
$IFontStyleName = 'ITextBAHPL';//italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 11,'italic' => true));

//set paragraf
$judulParagrafStyle = 'judulStyle';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//mulai isi word -- 

//tambahkan tabel

$fancyTableStyleName = 'header BAKNH';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VMergeStart = array('valign' => 'center', 'vMerge' => 'restart');
$VMergeContinue = array('valign' => 'center', 'vMerge' => 'continue');

$fontStyle = array('size'=>10, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>10, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>8, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(3700,$VMergeStart)->addText("JURUSAN ".strtoupper($nama_jurusan)."\nFAKULTAS ".strtoupper($nama_fakultas)."\n".strtoupper($nama_universitas)."\n\nBANDUNG", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null, $VAlignCellStyle)->addText('BERITA ACARA HASIL PENGADAAN LANGSUNG', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Nomor\t\t:\t$nomor_bahpl", $fontStyle, array('spaceAfter' => 0));
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Tanggal\t\t:\t".$pengaturan->formatTanggal($tanggal_baknh), $fontStyle, array('spaceAfter' => 0));
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Pekerjaan\t:\tPekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Tahun $tahun", $fontStyle, array('spaceAfter' => 0));

//end tabel
// end header

//isi word
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$hari_baknh = $pengaturan->tanggalToNamaHari($tanggal_baknh);
$tanggal_huruf_baknh = $pengaturan->formatTanggal2($tanggal_baknh);
$section->addText("Pada hari $hari_baknh Tanggal$tanggal_huruf_baknh, kami yang bertanda tangan di bawah ini Pokja Pengadaanan Langsung pengadaan barang/jasa telah mengadakan rapat hasil Pengadaanan langsung pekerjaan tersebut di atas.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("Rapat dipimpin oleh\t: $nama_ppb", $fontStyleName, $isiParagrafStyle2);
$section->addText("Jabatan\t\t\t: Pokja Pengadaan Barang/Jasa", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
//buat list item number
$section->addText("Dihadiri Oleh : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("Pokja : ", $fontStyleName, $isiParagrafStyle2);
$phpWord->addNumberingStyle(
                'multilevelBAHPL1',
                array('type' => 'multilevel', 'levels' => array(
                   array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$phpWord->addNumberingStyle(
                'multilevelBAHPL2',
                array('type' => 'multilevel', 'levels' => array(
                        array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
for($i=0;$i<3;$i++){
    $section->addListItem("$nama_panitia[$i]\t: $jabatan_panitia[$i]", 0, $fontStyleName,'multilevelBAHPL1', $isiParagrafStyle2);
}

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Kesimpulan Rapat berdasarkan : ", $fontStyleName, $isiParagrafStyle2);

$section->addListItem("Berita Acara Pemasukan/Pembukaan Surat Penawaran Harga Tanggal ".$pengaturan->formatTanggal($tanggal_bappsph)." Nomor : $nomor_bappsph", 0, $fontStyleName,'multilevelBAHPL2', $isiParagrafStyle2);
$section->addListItem("Berita Acara Penelitian Penawaran Harga tanggal ".$pengaturan->formatTanggal($tanggal_bapph)." Nomor : $nomor_bapph", 0, $fontStyleName,'multilevelBAHPL2', $isiParagrafStyle2);
$section->addListItem("Berita Acara Klarifikasi dan Negosiasi Penawaran Harga tanggal ".$pengaturan->formatTanggal($tanggal_baknh)." Nomor : $nomor_baknh", 0, $fontStyleName,'multilevelBAHPL2', $isiParagrafStyle2);
 
//end list item
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Sebagai kesimpulan hasil proses tersebut, bahwa Pengadaanan Langsung Pekerjaan Pengadaan Sebagai kesimpulan hasil proses tersebut, bahwa Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun telah sah dan memenuhi ketentuan dan dinyatakan sebagai calon Penyedia yaitu sebagai berikut : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Nama Perusahaan\t: $nama_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("Alamat Perusahaan\t: $alamat_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("N.P.W.P.\t\t: $npwp_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("Harga Penawaran\t: ".$harga_penawaran.",-", $fontStyleName, $isiParagrafStyle2);
$section->addText("Harga Negosiasi\t: ".$harga_spk.",-", $fontStyleName, $isiParagrafStyle2);

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian Berita Acara hasil Pengadaan langsung ini dibuat untuk dipergunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(5000, $VAlignCellStyle)->addText(' Pokja Pengadaan Barang/Jasa', $fontStyle,array('spaceAfter' => 0));
$table->addCell(7000, array('gridSpan' => 2))->addText("\tTim Peneliti Harga,", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
//listnumber---------------------------------------------
$phpWord->addNumberingStyle(
                'multilevelLHKNH2',
                array('type' => 'multilevel', 'levels' => array(
                   array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[0]", 0, $fontStyleName,'multilevelLHKNH2', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[0]", 1, $fontStyleName,'multilevelLHKNH2', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[1]", 0, $fontStyleName,'multilevelLHKNH2', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[1]", 1, $fontStyleName,'multilevelLHKNH2', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
    $tppb = $table->addCell(3000);
    $tppb->addText("$nama_ppb", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("NIP. $nip_ppb", $fontStyle,array('spaceAfter' => 0));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[2]", 0, $fontStyleName,'multilevelLHKNH2', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[2]", 1, $fontStyleName,'multilevelLHKNH2', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
//end tabel
?>
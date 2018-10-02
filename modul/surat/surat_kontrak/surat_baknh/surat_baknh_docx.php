<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextBAKNH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 10,'bold' => true));
$fontStyleName = 'normalTextBAKNH'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 10));
$ttdFontStyleName = 'ttdnormalTextBAKNH'; //ttd normal
$phpWord->addFontStyle($ttdFontStyleName, array('name' => 'Times New Roman','size' => 11));
$UFontStyleName = 'UnderlineTextBAKNH'; //underline
$phpWord->addFontStyle($UFontStyleName, array('name' => 'Times New Roman','size' => 10,'underline' => 'single'));
$boldUFontStyleName = 'BoldUTextBAKNH'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 10,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldITextBAKNH';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 10,'bold' => true,'italic' => true));
$IFontStyleName = 'ITextBAKNH';//italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 10,'italic' => true));

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
$table->addCell(null, $VAlignCellStyle)->addText('BERITA ACARA KLARIFIKASI DAN NEGOISASI HARGA ', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Nomor\t\t:\t$nomor_baknh", $fontStyle, array('spaceAfter' => 0));
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
$section->addText("Pada hari $hari_baknh Tanggal $tanggal_huruf_baknh, bertempat di Ruang Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung, kami yang bertanda tangan di bawah ini, Tim Peneliti Harga penawaran Harga Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun, telah mengadakan rapat evaluasi/negosiasi penawaran harga atas pekerjaan tersebut diatas : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle);

//buat list item number
$section->addText("Rapat Dihadiri Oleh : ", $fontStyleName, $isiParagrafStyle2);
$phpWord->addNumberingStyle(
                'multilevelBAKNH1',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
                    )
                )
            );
$phpWord->addNumberingStyle(
                'multilevelBAKNH2',
                array('type' => 'multilevel', 'levels' => array(
                        array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
                    )
                )
            );
$section->addListItem('Panitia : ', 0, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
for($i=0;$i<3;$i++){
    $section->addListItem("$nama_panitia[$i]", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
}
$section->addListItem('Penyedia Barang/Jasa : ', 0, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Badan Usaha\t\t: $nama_perusahaan", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Nama\t\t\t: $direktur_perusahaan", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Jabatan\t\t\t: Direktur", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);

$section->addListItem('Dasar Evaluasi/Negosiasi Penawaran Harga adalah sebagai berikut : ', 0, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Peraturan Presiden RI No. 54 Tahun 2010 Tentang Pengadaan Barang dan Jasa Pemerintah Beserta Perubahan dan turunannya;", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Peraturan Menteri Keuangan  RI No. 67/PMK.05/Tahun 2013;  ", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("DIPA UIN Sunan Gunung Djati Bandung Tahun 2018 Nomor: SP DIPA-025.04/423523/2018 tanggal 05 Desember 2017;", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Ketentuan harga perkiran sendiri/owner estimate;", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("PMK Tentang Standar Biaya Masukan Th. Anggaran 2018.", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Surat Penawaran Harga", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);

$section->addListItem('Kesimpulan Rapat :', 0, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Berdasarkan perkiraan perhitungan harga sesuai dengan hasil perhitungan OE/HPS, bahwa penawaran harga Pekerjaan $judul  Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung tahun $tahun, yang diajukan oleh $nama_perusahaan Rp.".$pengaturan->formatUang($total_penawaran)." (".$pengaturan->penyebut($total_penawaran)."Rupiah) setelah dilakukan evaluasi secara seksama, ternyata penawaran harga tersebut dapat dinegosiasi dan diperoleh harga negosiasi menjadi sebesar Rp.".$pengaturan->formatUang($total_spk)." (".$pengaturan->penyebut($total_spk)."Rupiah), Termasuk Pajak Yang Berlaku; ", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);
    $section->addListItem("Dari hasil negosiasi penawaran harga (terlampir) dengan memperhatikan dan meneliti kesesuaian dengan spesifikasi teknis yang dipersyaratkan dan jumlah harga yang diajukan, panitia sepakat mengusulkan kepada Pejabat Pembuat Komitmen jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung, bahwa $nama_perusahaan layak untuk diberi Surat perintah Kerja (SPK)/Perjanjian Kontrak.", 1, $fontStyleName,'multilevelBAKNH1', $isiParagrafStyle2);

//end list item
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian risalah rapat ini dibuat untuk dipergunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);
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
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[0]", 0, $ttdFontStyleName,'multilevelBAKNH2', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[0]", 1, $ttdFontStyleName,'multilevelBAKNH2', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[1]", 0, $ttdFontStyleName,'multilevelBAKNH2', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[1]", 1, $ttdFontStyleName,'multilevelBAKNH2', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
    $tppb = $table->addCell(3000);
    $tppb->addText("$nama_ppb", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("NIP. $nip_ppb", $fontStyle,array('spaceAfter' => 0));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[2]", 0, $ttdFontStyleName,'multilevelBAKNH2', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[2]", 1, $ttdFontStyleName,'multilevelBAKNH2', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
//end tabel
$section->addText("", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("Wakil dari Perusahaan\t: ", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("1....................................", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("Nama\t\t\t: ".$direktur_perusahaan, $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("Jabatan\t\t\t: Direktur", $ttdFontStyleName, $isiParagrafStyle2);

?>
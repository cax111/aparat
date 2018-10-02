<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$JudulFontStyleName = 'JudulBAP'; //bold
$phpWord->addFontStyle($JudulFontStyleName, array('name' => 'Times New Roman','size' => 10,'bold' => true));
$fontStyleName = 'textBAP'; //bold
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 10));

//set paragraf
$judulParagrafStyle = 'judulStyleBAP';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));
$listTTDBAPPH = 'ttd_bapph';
$phpWord->addParagraphStyle($listTTDBAPPH, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceBefore' => 4, 'line-height' => 2));

//mulai isi word -- 

$section->addText("BERITA ACARA PEMBAYARAN", $JudulFontStyleName, $judulParagrafStyle);
$section->addText("Nomor : ".$nomor_bap, $fontStyleName, $judulParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$tanggal_bap = $pengaturan->penjumlahanTanggal($tanggal_spk,8);
$section->addText("Pada hari ini ".$pengaturan->tanggalToNamaHari($tanggal_bap)." tanggal".$pengaturan->formatTanggal2($tanggal_bap).", kami yang bertanda tangan di bawah ini : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("1. Nama\t: $nama_ppk", $fontStyleName, $isiParagrafStyle2);
$section->addText("   Jabatan\t: Pejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle2);
//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');	
$fontStyle = array('size'=>10, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>10, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(1430, $VAlignCellStyleTop)->addText("   Alamat\t", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$pihak1 = $table->addCell(null, $VAlignCellStyle);
$pihak1->addText("$alamat_universitas", $fontStyle,array('spaceAfter' => 0));
$pihak1->addText("Dalam hal ini bertindak untuk dan atas nama Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung yang selanjutnya disebut PIHAK KESATU (I);", $fontStyle,array('spaceAfter' => 0));
//tabel
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("2. Nama\t: $direktur_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("   Jabatan\t: Direktur", $fontStyleName, $isiParagrafStyle2);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(1430, $VAlignCellStyleTop)->addText("   Alamat\t", $fontStyle,array('spaceAfter' => 0));
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$pihak2 = $table->addCell(null, $VAlignCellStyle);
$pihak2->addText("$alamat_perusahaan", $fontStyle,array('spaceAfter' => 0));
$pihak2->addText("Dalam hal ini bertindak untuk dan atas nama $nama_perusahaan yang selanjutnya disebut PIHAK KEDUA (II);", $fontStyle,array('spaceAfter' => 0));

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Berdasarkan Berita Acara Serah Terima Barang/Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung tahun $tahun, Nomor: ".$nomor_bastb." tanggal ".$pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7))." yang ditandatangani oleh Tim Pemeriksa dan Penerima Hasil Pekerjaan dan disetujui PIHAK KEDUA seperti terlampir untuk:", $fontStyleName, $isiParagrafStyle2);

//list syarat spk
$phpWord->addNumberingStyle(
                'untuk_bap',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'lowerLetter', 'text' => '%1.', 'left' => 1440, 'hanging' => 860, 'tabPos' => 1080)
                    )
                )
            );
//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');	
$fontStyle = array('size'=>10, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>10, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$addList = $table->addCell(null, $VAlignCellStyleTop);
$addList->addListItem("Pekerjaan ", 0, $fontStyleName,'untuk_bap', $isiParagrafStyle2);
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$table->addCell(null, $VAlignCellStyleTop)->addText("Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas $nama_universitas Bandung tahun $tahun", $fontStyle,array('spaceAfter' => 0));

$table->addRow();
$addList = $table->addCell(null, $VAlignCellStyleTop);
$addList->addListItem("Lokasi ", 0, $fontStyleName,'untuk_bap', $isiParagrafStyle2);
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$table->addCell(null, $VAlignCellStyleTop)->addText("$alamat_universitas", $fontStyle,array('spaceAfter' => 0));

$table->addRow();
$addList = $table->addCell(null, $VAlignCellStyleTop);
$addList->addListItem("Departemen/Instansi ", 0, $fontStyleName,'untuk_bap', $isiParagrafStyle2);
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$table->addCell(null, $VAlignCellStyleTop)->addText("$nama_universitas", $fontStyle,array('spaceAfter' => 0));

$table->addRow();
$addList = $table->addCell(null, $VAlignCellStyleTop);
$addList->addListItem("Surat Perintah Kerja(Kontrak) ", 0, $fontStyleName,'untuk_bap', $isiParagrafStyle2);
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$table->addCell(null, $VAlignCellStyleTop)->addText("Nomor: $nomor_spk tanggal ".$pengaturan->formatTanggal($tanggal_spk), $fontStyle,array('spaceAfter' => 0));

$table->addRow();
$addList = $table->addCell(null, $VAlignCellStyleTop);
$addList->addListItem("Harga Borongan ", 0, $fontStyleName,'untuk_bap', $isiParagrafStyle2);
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$table->addCell(null, $VAlignCellStyleTop)->addText("Rp. ".$pengaturan->formatUang($total_spk).".- Terbilang: (".$pengaturan->penyebut($total_spk)." Rupiah)", $fontStyle,array('spaceAfter' => 0));

$table->addRow();
$addList = $table->addCell(null, $VAlignCellStyleTop);
$addList->addListItem("Rekanan ", 0, $fontStyleName,'untuk_bap', $isiParagrafStyle2);
$table->addCell(100, $VAlignCellStyleTop)->addText(":", $fontStyle,array('spaceAfter' => 0));
$table->addCell(null, $VAlignCellStyleTop)->addText("$nama_perusahaan", $fontStyle,array('spaceAfter' => 0));
//end list syarat spk

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("dan terbukti bahwa prestasi pekerjaan telah selesai dikerjakan dengan baik berdasarkan Berita Acara Pemeriksaan Barang/Hasil Pekerjaan No. ".$nomor_bapb." tanggal ".$pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7)).".", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Berdasarkan ketentuan Nomor 2 (dua) Surat Perintah Kerja tersebut, maka Pihak kedua telah berhak menerima pembayaran seluruhnya sejumlah 100 % x ".$pengaturan->formatUang($total_spk).",- = Rp ".$pengaturan->formatUang($total_spk).",- Kepada Pihak Kedua. Kepada yang bersangkutan telah dibayarkan  sebesar  Rp ".$pengaturan->formatUang($total_spk).",-  terbilang: (".$pengaturan->penyebut($total_spk)." Rupiah).", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian Berita Acara Pekerjaan Pengadaan Belanja Pemeliharaan Jurusan Informatika Fakultas Sains dan Teknologi UIN Sunan Gunung Djati Bandung  ini dibuat dan ditandatangani di Bandung pada tanggal tersebut di atas untuk digunakan seperlunya.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
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
$table->addCell(9000, $VAlignCellStyleTop)->addText(' PIHAK KESATU (I)', $fontStyle,array('spaceAfter' => 0));
$pihak2 = $table->addCell(3000, $VAlignCellStyle);
$pihak2->addText("PIHAK KEDUA (II)", $fontStyle,array('spaceAfter' => 0));
$pihak2->addText("$nama_perusahaan", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$pihak1 = $table->addCell(null);
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("$nama_ppk", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("NIP. $nip_ppk", $fontStyle,array('spaceAfter' => 0));
$pihak2 = $table->addCell(null);
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("$direktur_perusahaan", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("Direktur", $fontStyle,array('spaceAfter' => 0));
//end tabel
?>
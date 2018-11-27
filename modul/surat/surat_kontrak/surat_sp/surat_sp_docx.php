<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$JudulFontStyleName = 'Judulsp'; //bold
$phpWord->addFontStyle($JudulFontStyleName, array('name' => 'Times New Roman','size' => 12,'bold' => true));

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

$section->addText("SURAT PESANAN (SP)", $JudulFontStyleName, $judulParagrafStyle);
$section->addText("Nomor : ".$nomor_sp, $fontStyleName, $judulParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText("Paket Pekerjaan : $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyleName, $judulParagrafStyle);
}else{
    $section->addText("Paket Pekerjaan : $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyleName, $judulParagrafStyle);   
}
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("Yang bertanda tangan di bawah ini :", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Nama\t\t: $nama_ppk", $fontStyleName, $isiParagrafStyle2);
$section->addText("Jabatan\t\t: Pejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle2);
$section->addText("Alamat\t\t: $alamat_universitas", $fontStyleName, $isiParagrafStyle2);
$section->addText("selanjutnya disebut sebagai Pejabat Pembuat Komitmen;", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
if($nama_fakultas=="lain-lain"){
    $section->addText("Berdasarkan Surat Perintah kerja (SPK) Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun nomor: $nomor_spk tanggal ".$pengaturan->formatTanggal($tanggal_spk).", bersama ini memerintahkan :", $fontStyleName, $isiParagrafStyle2);
}else{
    $section->addText("Berdasarkan Surat Perintah kerja (SPK) Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun nomor: $nomor_spk tanggal ".$pengaturan->formatTanggal($tanggal_spk).", bersama ini memerintahkan :", $fontStyleName, $isiParagrafStyle2);
}
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Nama CV\t: $nama_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("Alamat CV\t: $alamat_perusahaan", $fontStyleName, $isiParagrafStyle2);
$section->addText("yang dalam hal ini diwakili oleh: Direktur ", $fontStyleName, $isiParagrafStyle2);
$section->addText("selanjutnya disebut sebagai Penyedia Barang;", $fontStyleName, $isiParagrafStyle2);
$section->addText("Untuk mengirimkan barang dengan memperhatikan ketentuan-ketentuan sebagai berikut :", $fontStyleName, $isiParagrafStyle2);

//list Ketentuan SP
$phpWord->addNumberingStyle(
                'ketentuan_sp',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );

$section->addListItem("Rincian Barang : ", 0, $fontStyleName,'ketentuan_sp', $isiParagrafStyle2);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
//tambahkan tabel

$fancyTableStyleName = 'barang';
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
$table->addCell(4000,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(1000,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Harga Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(2000,$VAlignCellStyle)->addText('Jumlah Harga(Rp)',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
for ($i = 0; $i < $_POST['banyak_barang']; $i++) {
    $table->addRow();
    $table->addCell(null)->addText($i+1, $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $namaBarang = $table->addCell(3500);
        $namaBarang->addText($nama_barang[$i]."\n", $fontStyle,array('spaceAfter' => 0));
        $namaBarang->addText("\nspesifikasi : ".$spesifikasi[$i], $spekFontStyle,array('spaceAfter' => 0));
    $table->addCell(400)->addText($volume[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($satuan[$i], $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($pengaturan->formatUang($hps_spk[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
    $table->addCell(null)->addText($pengaturan->formatUang($total_harga_spk[$i]), $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
}  
$table->addRow();
$table->addCell(null,array('gridSpan' => 5))->addText("Total", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText($pengaturan->formatUang($total_spk), $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));

//end tabel

$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$tanggalTempo = $pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7));
$section->addListItem("Tanggal barang diterima : Maksimal tanggal {$tanggalTempo};", 0, $fontStyleName,'ketentuan_sp', $isiParagrafStyle2);
$section->addListItem("Syarat-syarat pekerjaan: sesuai dengan persyaratan dan ketentuan Kontrak;", 0, $fontStyleName,'ketentuan_sp', $isiParagrafStyle2);
$section->addListItem("Waktu penyelesaian: selama 07 (tujuh) hari kalender dan pekerjaan harus sudah selesai pada tanggal 27 Februari 2018.", 0, $fontStyleName,'ketentuan_sp', $isiParagrafStyle2);
$section->addListItem("Alamat pengiriman barang : $alamat_universitas", 0, $fontStyleName,'ketentuan_sp', $isiParagrafStyle2);
$section->addListItem("Denda: Terhadap setiap hari keterlambatan penyelesaian pekerjaan Penyedia Jasa akan dikenakan Denda Keterlambatan sebesar 1/1000 (satu per seribu) dari Nilai Kontrak atau bagian tertentu dari Nilai Kontrak sebelum PPN sesuai dengan persyaratan dan ketentuan Kontrak.", 0, $fontStyleName,'ketentuan_sp', $isiParagrafStyle2);
//end list syarat spk
$section->addText("", $fontStyleName, $isiParagrafStyle2);
//tambahkan tabel
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VAlignCellStyleTop = array('valign' => 'top');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');
$UFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'underline' => 'single');
$BoldFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true);

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$pihak2 = $table->addCell(5000, $VAlignCellStyleTop);
$pihak2->addText('Menerima dan menyetujui : ', $BoldFontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak2->addText("$nama_perusahaan", $fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak1 = $table->addCell(6000, $VAlignCellStyle);
$pihak1->addText("Bandung, ".$pengaturan->formatTanggal($tanggal_spk), $fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak1->addText("Untuk dan atas nama UIN SGD Bandung", $fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak1->addText("Pejabat Pembuat Komitmen", $fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$table->addRow();
$pihak2 = $table->addCell(null);
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("$direktur_perusahaan", $UFontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak2->addText("Direktur", $fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak1 = $table->addCell(null);
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("$nama_ppk", $BoldFontStyle,array('spaceAfter' => 0, 'align' => 'right'));
$pihak1->addText("NIP. $nip_ppk", $fontStyle,array('spaceAfter' => 0, 'align' => 'right'));
//end tabel
?>
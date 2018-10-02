<?php
// New section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$JudulFontStyleName = 'JudulSPK'; //bold
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

$section->addText("SURAT PERIHNTAH KERJA", $JudulFontStyleName, $judulParagrafStyle);
$section->addText("Nomor : ".$nomor_spk, $fontStyleName, $judulParagrafStyle);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("", $boldFontStyleName, $isiParagrafStyle2);
$section->addText("Pada hari ini ".$pengaturan->tanggalToNamaHari($tanggal_spk)." tanggal".$pengaturan->formatTanggal2($tanggal_spk).", kami yang bertanda tangan di bawah ini : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("1. Nama\t: $nama_ppk", $fontStyleName, $isiParagrafStyle2);
$section->addText("   Jabatan\t: Pejabat Pembuat Komitmen", $fontStyleName, $isiParagrafStyle2);
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
$section->addText("Pihak KESATU dan pihak KEDUA telah sepakat mengadakan persetujuan bahwa pihak KESATU memberikan pekerjaan kepada pihak KEDUA berupa Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung tahun 2018, dengan harga borongan sebesar Rp.".$pengaturan->formatUang($total_spk).".- terbilang: (".$pengaturan->penyebut($total_spk)."Rupiah) termasuk pajak, dengan ketentuan/syarat- syarat sebagai berikut :", $fontStyleName, $isiParagrafStyle2);

//list syarat spk
$phpWord->addNumberingStyle(
                'syarat_spk',
                array('type' => 'multilevel', 'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$section->addListItem("Harga borongan tersebut merupakan harga tetap, sudah termasuk PPN 10% yang berlaku;", 0, $fontStyleName,'syarat_spk', $isiParagrafStyle2);
$tanggalTempo = $pengaturan->formatTanggal($pengaturan->penjumlahanTanggal($tanggal_spk,7));
$section->addListItem("Penyelesaian pekerjaan/penyerahan barang selambat-lambatnya tanggal {$tanggalTempo};", 0, $fontStyleName,'syarat_spk', $isiParagrafStyle2);
$section->addListItem("Pembayaran harga borongan akan dibebankan pada BOPTN UIN Sunan Gunung Djati tahun $tahun setelah barang-barang diterima dengan lengkap dan baik melalui Panitia Pemeriksa dan Penerima Barang;", 0, $fontStyleName,'syarat_spk', $isiParagrafStyle2);
$section->addListItem("Kecuali berdasarkan sebab-sebab yang dapat diterima PIHAK KESATU atau sebab diluar kekuasaan PIHAK KEDUA, maka keterlambatan penyerahan sesuai dengan point 2 tersebut di atas, akan dikenakan denda sebesar dari jumlah harga yang masih harus diserahkan dan harus dilunasi dalam tempo 07 (tujuh) hari batas waktu tersebut;", 0, $fontStyleName,'syarat_spk', $isiParagrafStyle2);
$section->addListItem("Biaya-biaya yang timbul sebagai sebab akibat Surat Perintah Kerja ini sepenuhnya tanggung jawab PIHAK KEDUA, termasuk kewajiban membayar Bea Materai menurut ketentuan yang berlaku;", 0, $fontStyleName,'syarat_spk', $isiParagrafStyle2);
$section->addListItem("Apabila ada terjadi perselisihan akan diselesaikan secara musyawarah atau melalui Pengadilan Negeri.", 0, $fontStyleName,'syarat_spk', $isiParagrafStyle2);
//end list syarat spk

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian berita acara ini kami buat, untuk dipergunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);

$section->addText("", $fontStyleName, $isiParagrafStyle2);
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
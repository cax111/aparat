<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 1000, 'marginRight' => 1000, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextBAHPL'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));
$fontStyleName = 'normalTextBAHPL'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 11));
$kecilFontStyleName = 'kecilNormalTextBAHPL'; //kecil normal
$phpWord->addFontStyle($kecilFontStyleName, array('name' => 'Times New Roman','size' => 10));
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

$fancyTableStyleName = 'header BAPP';
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
if($nama_fakultas=="lain-lain"){
$jurus = $table->addCell(3700,$VMergeStart);
$jurus->addText(strtoupper($nama_jurusan)."\n".strtoupper($nama_universitas), $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$jurus->addText("BANDUNG", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
}else{
$jurus = $table->addCell(3700,$VMergeStart);
$jurus->addText("JURUSAN ".strtoupper($nama_jurusan)."\nFAKULTAS ".strtoupper($nama_fakultas)."\n".strtoupper($nama_universitas), $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$jurus->addText("BANDUNG", $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
}
$table->addCell(null, $VAlignCellStyle)->addText('BERITA ACARA PENGUMUMAN PENYEDIA', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Nomor\t\t:     $nomor_bapp", $fontStyle, array('spaceAfter' => 0));
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Tanggal\t\t:     ".$pengaturan->formatTanggal($tanggal_pp), $fontStyle, array('spaceAfter' => 0));
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$cell = $table->addCell(null,$VAlignCellStyle);
$innerCell = $cell->addTable()->addRow();
$innerCell->addCell(1700)->addText("Pekerjaan\t: \t\t", $fontStyle, array('spaceAfter' => 0));
if($nama_fakultas=="lain-lain"){
    $innerCell->addCell()->addText("Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Tahun $tahun", $fontStyle, array('spaceAfter' => 0));
}else{
    $innerCell->addCell()->addText("Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Tahun $tahun", $fontStyle, array('spaceAfter' => 0));
}
//end tabel
// end header

//isi word
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$hari_baknh = $pengaturan->tanggalToNamaHari($tanggal_baknh);
$tanggal_huruf_baknh = $pengaturan->formatTanggal2($tanggal_baknh);
if($nama_fakultas=="lain-lain"){
    $section->addText("Berdasarkan berita acara penetapan penyedia tanggal ".$pengaturan->formatTanggal($tanggal_pp)." nomor : $nomor_pp dengan ini pokja, panitia pengadaan barang/jasa $nama_jurusan $nama_universitas  Bandung Tahun $tahun mengumumkan sebagai pemenang dan selaku pelaksana penunjukan langsung untuk : ", $fontStyleName, $isiParagrafStyle2);
}else{
    $section->addText("Berdasarkan berita acara penetapan penyedia tanggal ".$pengaturan->formatTanggal($tanggal_pp)." nomor : $nomor_pp dengan ini pokja, panitia pengadaan barang/jasa Jurusan $nama_jurusan Fakultas $nama_fakultas $nama_universitas  Bandung Tahun $tahun mengumumkan sebagai pemenang dan selaku pelaksana penunjukan langsung untuk : ", $fontStyleName, $isiParagrafStyle2);
}
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//tambahkan tabel
$fancyTableStyleName = 'namaPekerjaan';
$fancyTableStyle = array('cellMargin' => 0, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
if($nama_fakultas=="lain-lain"){
    $table->addRow();
    $table->addCell(3000)->addText('Nama Pekerjaan', $fontStyle,array('spaceAfter' => 0));
    $table->addCell(10)->addText(": ", $fontStyle,array('spaceAfter' => 0));
    $table->addCell(7000)->addText(" Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle,array('spaceAfter' => 0));
    $table->addRow();
    $table->addCell(null)->addText('Uraian Pekerjaan', $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(": ", $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(" Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle,array('spaceAfter' => 0));
    $table->addRow();
    $table->addCell(null)->addText('Lokasi Pekerjaan', $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(": ", $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(" $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle,array('spaceAfter' => 0));
}else{
    $table->addRow();
    $table->addCell(3000)->addText('Nama Pekerjaan', $fontStyle,array('spaceAfter' => 0));
    $table->addCell(10)->addText(": ", $fontStyle,array('spaceAfter' => 0));
    $table->addCell(7000)->addText(" Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle,array('spaceAfter' => 0));
    $table->addRow();
    $table->addCell(null)->addText('Uraian Pekerjaan', $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(": ", $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(" Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle,array('spaceAfter' => 0));
    $table->addRow();
    $table->addCell(null)->addText('Lokasi Pekerjaan', $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(": ", $fontStyle,array('spaceAfter' => 0));
    $table->addCell(null)->addText(" Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle,array('spaceAfter' => 0));
}
$table->addRow();
$table->addCell(null)->addText('Nilai total HPS', $fontStyle,array('spaceAfter' => 0));
$table->addCell(null)->addText(": ", $fontStyle,array('spaceAfter' => 0));
$a = $table->addCell(null);
$pisahin = " Rp.".$pengaturan->formatUang($total_hps)." Terbilang : (".$pengaturan->penyebut($total_penawaran)."Rupiah )";
$textRun = $a->addTextRun($isiParagrafStyle2);
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
    for($i=0;$i<count($pisah);$i++){
        if($i>=$ambil1 && $i<=$ambil2){
            $textRun->addText($pisah[$i]." ", $IFontStyleName);
        }else{
            $textRun->addText($pisah[$i]." ", $fontStyleName);
        }
    }
    
//end tabel
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Adalah : ", $fontStyleName, $isiParagrafStyle2);

//tambahkan tabel

$fancyTableStyleName = 'tabelBAPP';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
$cellRowContinue = array('vMerge' => 'continue');

$fontStyle = array('size'=>10, 'name'=>'Times New Roman');
$TfontStyle = array('bold'=>true, 'size'=>10, 'name' => 'Times New Roman');
$spekFontStyle = array('bold'=>true, 'size'=>6, 'name' => 'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(400);
$table->addCell(500,$cellRowSpan)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText('Nama Dan Alamat Penyedia',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowSpan)->addText('NPWP',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowSpan)->addText('Dokumen Teknis',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowSpan)->addText('Harga Satuan',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowSpan)->addText('Harga Penawaran (Rp)',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowSpan)->addText('Negosiasi Harga (Rp)',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowSpan)->addText('Ket',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));

$table->addRow();
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText("Nilai HPS", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow();
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText("Rp.".$pengaturan->formatUang($total_hps).",-", $TfontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null,$cellRowContinue)->addText("", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));

$table->addRow();
$table->addCell(null)->addText("01", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null)->addText("$nama_perusahaan Alamat $alamat_perusahaan", $fontStyle, array('spaceAfter' => 0, 'align' => 'left'));
$table->addCell(null)->addText("$npwp_perusahaan", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null)->addText("MS", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null)->addText("v", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null)->addText("Rp.".$pengaturan->formatUang($total_penawaran), $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null)->addText("Rp.".$pengaturan->formatUang($total_spk), $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
if($nama_fakultas=="lain-lain"){
    $table->addCell(null)->addText("Pemenang penunjukkan langsung Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
}else{
    $table->addCell(null)->addText("Pemenang penunjukkan langsung Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Bandung Tahun $tahun", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
}
//end tabel

$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Catatan : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("V\t= Harga satuan wajar\t\t\tX\t= Harga satuan tidak wajar", $kecilFontStyleName, $isiParagrafStyle2);
$section->addText("MS\t= Memenuhi syarat\t\t\tTS\t= Tidak sah", $kecilFontStyleName, $isiParagrafStyle2);
$section->addText("DP\t= Dapat dipertanggung jawabkan", $kecilFontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Demikian pengumuman ini disampaikan untuk dijadikan bahan periksa, atas perhatianya kami ucapkan terima kasih. ", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\t\tPokja Pengadaan Barang/Jasa", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "\t\t\t\t\t\t\t\t\t $nama_ppb";
$textRun = $section->createTextRun($isiParagrafStyle2);
$pisah = explode(" ",$pisahin);
for($i=0;$i<count($pisah);$i++){
    if($i==0){
        $textRun->addText($pisah[$i], null);
    }else{
        $textRun->addText($pisah[$i]." ", $boldUFontStyleName);
    }

}
$section->addText("\t\t\t\t\t\t\t\t\tNIP. $nip_ppb", $fontStyleName, $isiParagrafStyle2);
?>
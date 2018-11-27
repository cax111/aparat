<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set font
$boldFontStyleName = 'BoldTextLBAKNH'; //bold
$phpWord->addFontStyle($boldFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true));
$fontStyleName = 'normalTextLBAKNH'; //normal
$phpWord->addFontStyle($fontStyleName, array('name' => 'Times New Roman','size' => 11));
$UFontStyleName = 'UnderlineTextLBAKNH'; //underline
$phpWord->addFontStyle($UFontStyleName, array('name' => 'Times New Roman','size' => 11,'underline' => 'single'));
$boldUFontStyleName = 'BoldUTextLBAKNH'; //bold&underline
$phpWord->addFontStyle($boldUFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true,'underline' => 'single'));
$boldIFontStyleName = 'BoldITextLBAKNH';//bold&italic
$phpWord->addFontStyle($boldIFontStyleName, array('name' => 'Times New Roman','size' => 11,'bold' => true,'italic' => true));
$IFontStyleName = 'ITextLBAKNH';//italic
$phpWord->addFontStyle($IFontStyleName, array('name' => 'Times New Roman','size' => 11,'italic' => true));

//set paragraf
$judulParagrafStyle = 'judulStyleLBAKNH';
$phpWord->addParagraphStyle($judulParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle = 'isiStyleLBAKNH';
$phpWord->addParagraphStyle($isiParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,'spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2StyleLBAKNH';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//mulai isi word -- 

$section->addText("\t\t\t\t\t\t\t\tLAMPIRAN\t: SURAT PERINTAH KERJA", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\tNOMOR\t: $nomor_spk", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\tTANGGAL\t: ".$pengaturan->formatTanggal($tanggal_spk), $fontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText("PEKERJAAN ".strtoupper($judul), $fontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText(strtoupper($nama_jurusan)." UIN SUNAN GUNUNG DJATI BANDUNG TAHUN $tahun", $fontStyleName, $isiParagrafStyle);
}else{
    $section->addText("JURUSAN ".strtoupper($nama_jurusan)." FAKULTAS ".strtoupper($nama_fakultas)." UIN SUNAN GUNUNG DJATI BANDUNG TAHUN $tahun", $fontStyleName, $isiParagrafStyle);
}
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
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
$table->addCell(600,$VAlignCellStyle)->addText('No',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(3500,$VAlignCellStyle)->addText('Nama Barang',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(600,$VAlignCellStyle)->addText('Vol',$TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));
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
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle);
$pisahin = "Terbilang: (".$pengaturan->penyebut($total_penawaran)." Rupiah ), termasuk pajak.";
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
$pihak2 = $table->addCell(8000, $VAlignCellStyle);
$pihak2->addText("PIHAK KEDUA (II)", $fontStyle,array('spaceAfter' => 0));
$pihak2->addText("$nama_perusahaan", $fontStyle,array('spaceAfter' => 0));
$pihak1 = $table->addCell(4300, $VAlignCellStyle);
$pihak1->addText("PIHAK KESATU (I)", $fontStyle,array('spaceAfter' => 0));
$pihak1->addText("Pejabat Pembuat Komitmen", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$pihak1 = $table->addCell(null);
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak1->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
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
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("$nama_ppk", $BoldUFontStyle,array('spaceAfter' => 0));
$pihak2->addText("NIP. $nip_ppk", $fontStyle,array('spaceAfter' => 0));
//end tabel
?>
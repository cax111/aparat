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

$section->addText("\t\t\t\t\t\t\t\tLAMPIRAN BERITA ACARA", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\tKLARIFIKASI DAN NEGOSIASI HARGA", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\tNOMOR\t: $nomor_baknh", $fontStyleName, $isiParagrafStyle2);
$section->addText("\t\t\t\t\t\t\t\tTANGGAL\t: ".$pengaturan->formatTanggal($tanggal_baknh), $fontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText('', $boldFontStyleName, $isiParagrafStyle2);
$section->addText("HASIL KLARIFIKASI DAN NEGOSIASI HARGA", $fontStyleName, $isiParagrafStyle);
$section->addText("PEKERJAAN ".strtoupper($judul), $fontStyleName, $isiParagrafStyle);
if($nama_fakultas=="lain-lain"){
    $section->addText(strtoupper($nama_jurusan)." UIN SUNAN GUNUNG DJATI BANDUNG", $fontStyleName, $isiParagrafStyle);
}else{
    $section->addText("JURUSAN ".strtoupper($nama_jurusan)." FAKULTAS ".strtoupper($nama_fakultas)." UIN SUNAN GUNUNG DJATI BANDUNG", $fontStyleName, $isiParagrafStyle);   
}
$section->addText("TAHUN $tahun", $fontStyleName, $isiParagrafStyle);
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
$total_spk=0;
for($i=0;$i<$_POST['banyak_barang'];$i++){
    $total_spk += $total_harga_spk[$i];
} 
$table->addRow();
$table->addCell(null,array('gridSpan' => 5))->addText("Total", $TfontStyle, array('spaceAfter' => 0, 'align' => 'right'));
$table->addCell(null)->addText($pengaturan->formatUang($total_spk), $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));

//end tabel
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$pisahin = "Terbilang: (".$pengaturan->penyebut($total_spk)." Rupiah ), termasuk pajak.";
$textRun = $section->createTextRun($isiParagrafStyle);
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
$table->addCell(7000, array('gridSpan' => 2))->addText("Tim Peneliti Harga,", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
//listnumber---------------------------------------------
$phpWord->addNumberingStyle(
                'multilevelLHKNH',
                array('type' => 'multilevel', 'levels' => array(
                   array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[0]", 0, $ttdFontStyleName,'multilevelLHKNH', $isiParagrafStyle2);
$namaPanitia->addText("       $jabatan_panitia[0]", $fontStyle, $isiParagrafStyle2);
$line = $table->addCell();
$line->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$line->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[1]", 0, $ttdFontStyleName,'multilevelLHKNH', $isiParagrafStyle2);
$namaPanitia->addText("       $jabatan_panitia[1]", $fontStyle, $isiParagrafStyle2);
$line = $table->addCell();
$line->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$line->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
    $tppb = $table->addCell(3000);
    $tppb->addText("$nama_ppb", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("NIP. $nip_ppb", $fontStyle,array('spaceAfter' => 0));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[2]", 0, $ttdFontStyleName,'multilevelLHKNH', $isiParagrafStyle2);
$namaPanitia->addText("       $jabatan_panitia[2]", $fontStyle, $isiParagrafStyle2);
$line = $table->addCell();
$line->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$line->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
//end tabel
$section->addText("", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("Wakil dari Perusahaan\t: ", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("1....................................", $ttdFontStyleName, $isiParagrafStyle2);
$section->addText("Nama\t\t\t: ".$direktur_perusahaan, $ttdFontStyleName, $isiParagrafStyle2);  
$section->addText("Jabatan\t\t\t: Direktur", $ttdFontStyleName, $isiParagrafStyle2);  
?>
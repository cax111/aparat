<?php
// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 710, 'marginRight' => 710, 'marginTop' =>3120, 'marginBottom' => 710)
);
//set paragraf
$judulParagrafStyle = 'judulStyle';
$phpWord->addParagraphStyle($judulParagrafStyle, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
$isiParagrafStyle = 'isiStyle';
$phpWord->addParagraphStyle($isiParagrafStyle, array('spaceAfter' => 0));
$isiParagrafStyle2 = 'isi2Style';
$phpWord->addParagraphStyle($isiParagrafStyle2, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 0));

//mulai isi word -- 

//tambahkan tabel

$fancyTableStyleName = 'header BAPPSPH';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');
$VMergeStart = array('valign' => 'center', 'vMerge' => 'restart');
$VMergeContinue = array('valign' => 'center', 'vMerge' => 'continue');

$fontStyle = array('size'=>10, 'name'=>'Times New Roman');
$SfontStyle = array('size'=>11, 'name'=>'Times New Roman');
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
$table->addCell(null, $VAlignCellStyle)->addText('BERITA ACARA PEMASUKAN/PEMBUKAAN SURAT PENAWARAN HARGA', $TfontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Nomor\t\t:     $nomor_bappsph", $fontStyle, array('spaceAfter' => 0));
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addCell(null,$VAlignCellStyle)->addText("Tanggal\t\t:     $tanggal_bappsph", $fontStyle, array('spaceAfter' => 0));
$table->addRow();
$table->addCell(null,$VMergeContinue)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$cell = $table->addCell(null,$VAlignCellStyle);
$innerCell = $cell->addTable()->addRow();
$innerCell->addCell(1700)->addText("Pekerjaan\t:", $fontStyle, array('spaceAfter' => 0));
if($nama_fakultas=="lain-lain"){
    $innerCell->addCell()->addText("Pekerjaan $judul $nama_jurusan UIN Sunan Gunung Djati Tahun $tahun", $fontStyle, array('spaceAfter' => 0));
}else{
    $innerCell->addCell()->addText("Pekerjaan $judul Jurusan $nama_jurusan Fakultas $nama_fakultas UIN Sunan Gunung Djati Tahun $tahun", $fontStyle, array('spaceAfter' => 0));
}
//end tabel
// end header

//isi word
$section->addText("", $IFontStyleName, $isiParagrafStyle);
$section->addText("Pada hari Senin Tanggal Dua Belas Bulan Februari Tahun Dua Ribu Delapan Belas, kami yang bertanda tangan di bawah ini, Pokja Pengadaan pemasukan/pembukaan surat penawaran harga pekerjaan tersebut di atas, sesuai dengan jadwal yang telah ditetapkan :", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle);

//buat list item number

$phpWord->addNumberingStyle(
            	'multilevel1',
            	array('type' => 'multilevel', 'levels' => array(
                    array('restart' => true, 'format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('restart' => true, 'format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
                    )
            	)
        	);
//buat table
$fancyTableStyleName = 'header BAPPSPH2';
$fancyTableStyle = array('borderSize' => 0, 'borderColor' => 'ffffff', 'cellMargin' => 0);
$section->addListItem('Yang dihadiri oleh anggota tim peneliti harga : ', 0, $fontStyleName,'multilevel1', $isiParagrafStyle2);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table2 = $section->addTable($fancyTableStyleName);
for($i=0;$i<3;$i++){
    $table2->addRow();
    $table2->addCell(null,$VAlignCellStyle)->addText("       ".($i+1).".", $SfontStyle, array('spaceAfter' => 0));
    $table2->addCell(3500,$VAlignCellStyle)->addText("   ".$nama_panitia[$i], $SfontStyle, array('spaceAfter' => 0));
    $table2->addCell(null,$VAlignCellStyle)->addText("\t: ", $SfontStyle, array('spaceAfter' => 0));
    $table2->addCell(null,$VAlignCellStyle)->addText("  ".$jabatan_panitia[$i], $SfontStyle, array('spaceAfter' => 0));
}
$section->addListItem('Penyedia Barang : ', 0, $fontStyleName,'multilevel1', $isiParagrafStyle2);
$section->addText("$nama_perusahaan diwakili oleh : ", $fontStyleName, $isiParagrafStyle2);
    $tableD = $section->addTable($fancyTableStyleName);
    $tableD->addRow();
    $tableD->addCell(null,$VAlignCellStyle)->addText("       ".(1).".", $SfontStyle, array('spaceAfter' => 0));
    $tableD->addCell(3500,$VAlignCellStyle)->addText("   $direktur_perusahaan ", $SfontStyle, array('spaceAfter' => 0));
    $tableD->addCell(null,$VAlignCellStyle)->addText("\t: ", $SfontStyle, array('spaceAfter' => 0));
    $tableD->addCell(null,$VAlignCellStyle)->addText("  Direktur", $SfontStyle, array('spaceAfter' => 0));

//end list item
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Proses Pembukaan Surat Penawaran : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("Sistem yang digunakan dalam mengajukan penawaran adalah sistem satu sampul dan dalam pelaksanaan pembukaan surat penawaran, pengecekan persyaratan administrasi, teknis dan penelitian surat penawaran yang diajukan penyedia barang, disaksikan oleh 1 (satu) orang yang mewakili penyedia barang dan 2 (dua) orang yang mewakili Pokja, yaitu : ", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $fontStyleName, $isiParagrafStyle2);

//buat list item number

$phpWord->addNumberingStyle(
                'multilevel2',
                array('type' => 'multilevel', 'levels' => array(
                    array('restart' => true, 'format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('restart' => true, 'format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
                    )
                )
            );
$section->addListItem('Wakil Penyedia Barang : ', 0, $fontStyleName,'multilevel2', $isiParagrafStyle2);
    $tableD = $section->addTable($fancyTableStyleName);
    $tableD->addRow();
    $tableD->addCell(null,$VAlignCellStyle)->addText("       ".(1).".", $SfontStyle, array('spaceAfter' => 0));
    $tableD->addCell(3500,$VAlignCellStyle)->addText("   $direktur_perusahaan ", $SfontStyle, array('spaceAfter' => 0));
    $tableD->addCell(null,$VAlignCellStyle)->addText("\t: ", $SfontStyle, array('spaceAfter' => 0));
    $tableD->addCell(null,$VAlignCellStyle)->addText("  Direktur", $SfontStyle, array('spaceAfter' => 0));
$section->addText("", $IFontStyleName, $isiParagrafStyle2);
$section->addListItem('Wakil dari Pokja : ', 0, $fontStyleName,'multilevel2', $isiParagrafStyle2);
    $table3 = $section->addTable($fancyTableStyleName);
    $table3->addRow();
    $table3->addCell(null,$VAlignCellStyle)->addText("       ".(1).".", $SfontStyle, array('spaceAfter' => 0));
    $table3->addCell(3500,$VAlignCellStyle)->addText("   ".$nama_panitia[0]." ", $SfontStyle, array('spaceAfter' => 0));
    $table3->addCell(null,$VAlignCellStyle)->addText("\t: ", $SfontStyle, array('spaceAfter' => 0));
    $table3->addCell(null,$VAlignCellStyle)->addText("  Ketua", $SfontStyle, array('spaceAfter' => 0));
    $table3->addRow();
    $table3->addCell(null,$VAlignCellStyle)->addText("       ".(2).".", $SfontStyle, array('spaceAfter' => 0));
    $table3->addCell(3500,$VAlignCellStyle)->addText("   ".$nama_panitia[1]." ", $SfontStyle, array('spaceAfter' => 0));
    $table3->addCell(null,$VAlignCellStyle)->addText("\t: ", $SfontStyle, array('spaceAfter' => 0));
    $table3->addCell(null,$VAlignCellStyle)->addText("  Anggota", $SfontStyle, array('spaceAfter' => 0));

//end list item
$section->addText("", $fontStyleName, $isiParagrafStyle2);
$section->addText("Pembukaan Penawaran : ", $boldFontStyleName, $isiParagrafStyle2);
//buat list item number
$phpWord->addNumberingStyle(
                'multilevel3',
                array('type' => 'multilevel', 'levels' => array(
                    array('restart' => true, 'format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360)
                    )
                )
            );
$section->addListItem("Pembukaan surat penawaran yang diajukan oleh ".strtoupper($nama_perusahaan)." kemudian isinya dibuka dan diperiksa, ternyata perusahaan tersebut memenuhi syarat.", 0, $fontStyleName,'multilevel3', $isiParagrafStyle2);
$section->addListItem("Pengecekan kelengkapan persyaratan administrasi dan teknis, sesuai dengan persyaratan yang diminta yaitu kepada peserta diwajibkan melampirkan foto copy (terlampir).", 0, $fontStyleName,'multilevel3', $isiParagrafStyle2);
$pisahin = "Jumlah Penawaran yang diajukan/disampaikan oleh ".strtoupper($nama_perusahaan)." adalah sebesar Rp.".$pengaturan->formatUang($total_penawaran)." terbilang (".$pengaturan->penyebut($total_penawaran)." Rupiah ) dengan masa pelaksanaan pekerjaan selama $waktu_pengerjaan_bappsph (".$pengaturan->penyebut($waktu_pengerjaan_bappsph).") hari kalender.";
$textRun = $section->addListItemRun(0,'multilevel3', $isiParagrafStyle2);
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
//$section->addListItem(, 0, $fontStyleName,'multilevel3', $isiParagrafStyle2);
$section->addListItem("Hasil pembukaan surat penawaran.", 0, $fontStyleName,'multilevel3', $isiParagrafStyle2);

//end list item
$section->addText("", $IFontStyleName, $isiParagrafStyle2);
//tambahkan tabel

$fancyTableStyleName = 'data perusahaan';
$fancyTableStyle = array('cellMargin' => 0, 'cellMarginRight'  => 0, 'cellMarginBottom' => 0, 'cellMarginLeft'   => 0, 'borderSize' => 6, 'borderColor' => '000000', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table1 = $section->addTable($fancyTableStyleName);
$table1->addRow();
$table1->addCell(3000,$VAlignCellStyle)->addText("Nama Perusahaan", $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table1->addCell(3000, $VAlignCellStyle)->addText('Legalitas Perusahaan', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addCell(2500, $VAlignCellStyle)->addText('Surat Penawaran', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addCell(2500, $VAlignCellStyle)->addText('Dok. Teknis', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addCell(2500, $VAlignCellStyle)->addText('Ket.', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addRow();
$table1->addCell(null,$VAlignCellStyle)->addText("$nama_perusahaan", $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));
$table1->addCell(null, $VAlignCellStyle)->addText('Ada', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addCell(null, $VAlignCellStyle)->addText('Ada', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addCell(null, $VAlignCellStyle)->addText('Ada', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   
$table1->addCell(null, $VAlignCellStyle)->addText('Lengkap', $fontStyle,array('spaceAfter' => 0, 'align' => 'center'));   

//end tabel
$section->addText("", $IFontStyleName, $isiParagrafStyle2);
$section->addText("Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.", $fontStyleName, $isiParagrafStyle2);
$section->addText("", $IFontStyleName, $isiParagrafStyle2);
//tambahkan tabel
$phpWord->addNumberingStyle(
                'multilevel5',
                array('type' => 'multilevel', 'levels' => array(
                    array('restart' => true, 'format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 0, 'tabPos' => 360)
                    )
                )
            );
$fancyTableStyleName = 'tandaTangan';
$fancyTableStyle = array('cellMargin' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'afterSpacing' => 0);
$VAlignCellStyle = array('valign' => 'center');

$fontStyle = array('size'=>11, 'name'=>'Times New Roman');
$BoldUFontStyle = array('size'=>11, 'name'=>'Times New Roman', 'bold'=>true, 'underline' => 'single');

$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow();
$table->addCell(5000, $VAlignCellStyle)->addText(' Pejabat Pengadaan Barang/Jasa', $fontStyle,array('spaceAfter' => 0));
$table->addCell(7000, array('gridSpan' => 2))->addText("\tTim Peneliti Harga,", $fontStyle,array('spaceAfter' => 0));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[0]", 0, $fontStyleName,'multilevel5', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[0]", 1, $fontStyleName,'multilevel5', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
$table->addCell(3000)->addText("", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[1]", 0, $fontStyleName,'multilevel5', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[1]", 1, $fontStyleName,'multilevel5', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));
$table->addRow();
    $tppb = $table->addCell(3000);
    $tppb->addText("$nama_ppb", $BoldUFontStyle,array('spaceAfter' => 0));
    $tppb->addText("NIP. $nip_ppb", $fontStyle,array('spaceAfter' => 0));
$namaPanitia = $table->addCell(null);
$namaPanitia->addListItem("$nama_panitia[2]", 0, $fontStyleName,'multilevel5', $isiParagrafStyle2);
$namaPanitia->addListItem("$jabatan_panitia[2]", 1, $fontStyleName,'multilevel5', $isiParagrafStyle2);
$table->addCell()->addText(".....................................", $fontStyle, array('spaceAfter' => 0, 'align' => 'center'));

//end tabel
?>
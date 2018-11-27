<?php
    $tampil = $surat_kontrak->tampilKontrak("WHERE id_surat = '$_GET[id_surat]'");
    foreach($tampil AS $t){
        $pisah = explode("/",$t['nomor_pph']);
        $nomor = (int)($pisah[0])+1;
        $gabungNomor = "0".$nomor;
        
        /*for($i=1;$i<6;$i++){
            $gabungNomor.="/".$pisah[$i];
        }*/
?>
<form action="" method="post" accept-charset="utf-8"> 
  <div id="form" style="display:none" class="box box-info">
    <div class="box-header">
      <i class="fa fa-envelope"></i>

      <h3 class="box-title">Kebutuhan Surat Berita Acara Pemasukan/Pembukaan Surat Penawaran Harga(BAP/PSPH)</h3>
              
      <h5>Nomor Surat</h5>
      <input class="form-control" type="text" name="nomor_bappsph" value="" required="required" >
      <h5>Tanggal</h5>
      <input class="form-control" type="date" name="tanggal_bappsph" required="required" >
      <h5>Waktu Pengerjaan(/hari)</h5>
      <input class="form-control" type="text" name="waktu_pengerjaan" required="required" placeholder="ex : 4">
      <br/>
      <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
    </div> 
    <?php
    }
      if(isset($_POST['ok'])){
        $tanggal = date('Y-m-d',strtotime($_POST['tanggal_bappsph']));
        $status = $surat_bappsph->insertBAPPSPH($_POST['nomor_bappsph'],$tanggal,$_POST['waktu_pengerjaan'],$_GET['id_surat']);      
        if($status=="Input Data Gagal."){
    ?>
          <div class="box-footer clearfix label-danger">
            <i class="fa fa-times"></i>
            <?= $status ?>
          </div> 
    <?php
        }else{
    ?>
          <div class="box-footer clearfix label-success">
            <i class="fa fa-check"></i>
            <?= $status ?>
          </div> 
    <?php            
        }
      }
    ?>         
  </div>
</form>
<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){     
    $("#form").slideDown(1000);  
});
</script>
<!-- end animasi form -->
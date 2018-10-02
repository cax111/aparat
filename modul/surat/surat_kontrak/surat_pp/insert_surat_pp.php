<?php
    $tampil = $surat_kontrak->tampilKontrak("WHERE id_surat = '$_GET[id_surat]'");
    foreach($tampil AS $t){
        $pisah = explode("/",$t['nomor_bahpl']);
        $nomor = (int)($pisah[0])+1;
        $gabungNomor = "0".$nomor;
        
        for($i=1;$i<6;$i++){
            $gabungNomor.="/".$pisah[$i];
        }
?>
<form action="" method="post" accept-charset="utf-8"> 
  <div id="form" style="display:none" class="box box-danger">
    <div class="box-header">
      <i class="fa fa-envelope"></i>

      <h3 class="box-title">Input Data Surat Penetapan Penyedia(PP)</h3>
              
      <h5>Nomor Surat</h5>
      <input class="form-control" type="text" name="nomor" value=<?=$gabungNomor?> required="required" >
      <h5>Tanggal Surat</h5>
      <input class="form-control" type="date" name="tanggal" required="required" >
      <h5>Tanggal Surat Perjanjian Kerjasama</h5>
      <input class="form-control" type="date" name="tanggal_spk" required="required" >
      <h5>Waktu Rapat</h5>
        <select name="waktu" class="form-control" required="required" >
          <option value="07.00">07.00</option>
          <option value="08.00">08.00</option>
          <option value="09.00">09.00</option>
          <option value="10.00">10.00</option>
          <option value="11.00">11.00</option>
          <option value="12.00">12.00</option>
          <option value="13.00">13.00</option>
          <option value="14.00">14.00</option>
          <option value="15.00">15.00</option>
          <option value="16.00">16.00</option>
          <option value="17.00">17.00</option>
        </select>
        <br/>
      <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
    </div> 
    <?php
    }
      if(isset($_POST['ok'])){
        $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
        $tanggal_spk = date('Y-m-d',strtotime($_POST['tanggal_spk']));
        $status = $surat_pp->insertPP($_POST['nomor'],$tanggal,$tanggal_spk,$_POST['waktu'],$_GET['id_surat']);      
        if($status=="Input Data Gagal."){
    ?>
          <div class="box-footer clearfix label-danger">
            <i class="fa fa-times"></i>
            <?= $status ?>
          </div> 
    <?php
        }
    ?>
    <?php   
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
<?php
  $tampil = $surat_bappsph->tampilBAPPSPH($_GET['id']);
  foreach($tampil AS $t){
?>
<form action="" method="post" accept-charset="utf-8"> 
  <div id="form" style="display:none" class="box box-info">
    <div class="box-header">
      <i class="fa fa-envelope"></i>

      <h3 class="box-title">Update Data Kebutuhan Surat Berita Acara Pemasukan/Pembukaan Surat Penawaran Harga(BAP/PSPH)</h3>
              
      <h5>Nomor Surat</h5>
      <input class="form-control" type="text" name="nomor_bappsph" value="<?=$t['nomor_bappsph']?>" required="required" >
      <h5>Tanggal</h5>
      <input class="form-control" type="date" name="tanggal_bappsph" value="<?=$t['tanggal_bappsph']?>" required="required" >
      <h5>Waktu Pengerjaan(Hari)</h5>
      <input class="form-control" type="text" name="waktu_pengerjaan" value="<?=$t['waktu_pengerjaan_bappsph']?>" required="required" >
      <br/>
<?php
  }
?>
            <label class="pull-left">
            <?php
                echo"<a class='btn btn-flat btn-warning' href='index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$_GET[id]'><i class='fa fa-arrow-circle-o-left'> </i> Kembali</a>";
            ?>
            </label> 
            <input class="btn btn-flat btn-success pull-right" type="submit" name="ok" value="Submit">
    </div> 
    <?php
      if(isset($_POST['ok'])){
        $tanggal = date('Y-m-d',strtotime($_POST['tanggal_bappsph']));
        $status = $surat_bappsph->insertBAPPSPH($_POST['nomor_bappsph'],$tanggal,$_POST['waktu_pengerjaan'],$_GET['id']);      
        if($status=="Input Data Gagal."){
    ?>
          <div class="box-footer clearfix label-danger">
            <i class="fa fa-times"></i>
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
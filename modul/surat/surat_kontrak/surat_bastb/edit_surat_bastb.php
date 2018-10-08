<?php
    $tampil = $surat_bastb->tampilBASTB($_GET['id']);
    foreach($tampil AS $t){
?>
<form action="" method="post" accept-charset="utf-8"> 
  <div id="form" style="display:none" class="box box-danger">
    <div class="box-header">
      <i class="fa fa-envelope"></i>

      <h3 class="box-title">Update Data Surat Berita Acara Serah Terima Barang (BASTB)</h3>
              
      <h5>Nomor Surat</h5>
      <input class="form-control" type="text" name="nomor" value="<?=$t['nomor_bastb']?>" required="required" >
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
        $status = $surat_bastb->insertBASTB($_POST['nomor'],$_GET['id']);      
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
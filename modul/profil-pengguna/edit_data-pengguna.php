<?php
    $tampil = $user->tampilUser("WHERE id_user = '$_GET[id]'");
    foreach($tampil AS $t){
?>
<form action="" method="post" accept-charset="utf-8"> 
  <div id="form" style="display:none" class="box box-danger">
    <div class="box-header">
      <i class="fa fa-envelope"></i>

      <h3 class="box-title">Ubah Data Pengguna</h3>
              
      <h5>Nama Perusahaan</h5>
      <input class="form-control" type="text" name="nama_perusahaan" value="<?=$t['nama_perusahaan']?>" required="required" >
      <h5>Nama Pemilik</h5>
      <input class="form-control" type="text" name="nama_pemilik" value="<?=$t['nama_user']?>" required="required" >
      <h5>Alamat Perusahaan</h5>
      <input class="form-control" type="text" name="alamat_perusahaan" value="<?=$t['alamat_perusahaan']?>" required="required" >
      <h5>NPWP Perusahaan</h5>
      <input class="form-control" type="text" name="npwp" value="<?=$t['npwp']?>" required="required" >
      <br/>
      <br/>
      <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
    </div> 
    <?php
    }
      if(isset($_POST['ok'])){
        $status = $user->ubahUser($_POST['nama_perusahaan'],$_POST['nama_pemilik'],$_POST['alamat_perusahaan'],$_POST['npwp'],$_GET['id']);      
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
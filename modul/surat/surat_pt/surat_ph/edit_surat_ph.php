<?php
    $tampil=$surat_pt->tampilPT(" WHERE id_surat=$_GET[id]");
    foreach($tampil AS $t){
?>
<form method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Update Data Surat Permintaan Harga (PH)</h3>
            <h5>Nomor Surat Permintaan Harga (PH)</h5>
            <input class="form-control" type="text" name="nomor" placeholder="Nomor Surat PH" value="<?=$t['nomor_ph']?>" required="required" >
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
                $status = $surat_pt->editPH($_POST['nomor'],$_GET['id']);
                if($status=="Input Data Gagal."){
        ?>
                    <div class="box-footer clearfix label-danger">
                        <i class="fa fa-times"></i>
                        <?= $status ?>
                    </div> 
        <?php
                }else{
                    header("location:index.php?page=surat_pt&act=detail_surat_pt&id=$_GET[id]");
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
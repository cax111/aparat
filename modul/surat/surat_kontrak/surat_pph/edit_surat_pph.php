<?php
    
    $tampil = $surat_pph->tampilPPH($_GET['id']);
    foreach($tampil AS $t){
?>

<form action="" method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>      
            <h3 class="box-title">Update Data Surat Permintaan Penawaran Harga(PPH)</h3>
              
            <h5>Nomor Surat</h5>
            <input class="form-control" type="text" name="nomor" value="<?=$t['nomor_pph']?>" required="required" >
            <h5>Tanggal</h5>
            <input class="form-control" type="date" name="tanggal" value="<?=$t['tanggal_pph']?>" required="required" >
            <h5>Tanggal Penawaran Paling Lambat</h5>
            <input class="form-control" type="date" name="tanggal_penawaran" value="<?=$t['tanggal_penawaran_pph']?>" required="required" >     
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
                        $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
                        $status = $surat_pph->insertPPH($_POST['nomor'],$tanggal,$_POST['tanggal_penawaran'],$_GET['id']);      
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
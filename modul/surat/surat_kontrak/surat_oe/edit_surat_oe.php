<?php
    
    $tampil = $surat_oe->tampilOE($_GET['id']);
    foreach($tampil AS $t){
?>

<form action="" method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Update Data Surat Owner Estimate(OE)</h3>
            <h5>Nomor Surat Owner Estimate</h5>
            <input class="form-control" type="text" name="nomor" placeholder="Nomor Surat" value="<?=$t['nomor_oe']?>" required="required" >
            <h5>Tanggal Surat Owner Estimate</h5>
            <input class="form-control" type="date" name="tanggal" value="<?=$t['tanggal_oe']?>" required="required" >        
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
                        $status = $surat_oe->insertOE($_POST['nomor'],$tanggal,$_GET['id']);
                        
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
<form method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Input Data Umum Surat Kontrak</h3>
            <h5>Nomor Surat Permintaan Harga (PH)</h5>
            <input class="form-control" type="text" name="nomor" placeholder="Nomor Surat PH" required="required" >
            
            <br/>
            <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
        </div>
        <?php
            if(isset($_POST['ok'])){
                $status = $surat_pt->insertPH($_POST['nomor'],$_GET['id_surat']);
                if($status=="Input Data Gagal."){
        ?>
                    <div class="box-footer clearfix label-danger">
                        <i class="fa fa-times"></i>
                        <?= $status ?>
                    </div> 
        <?php
                }else{
                    header("location:index.php?page=surat_pt&act=detail_surat_pt&id=$_GET[id_surat]");
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
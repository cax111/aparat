<?php
    $tampil = $surat_bapph->tampilBAPPH($_GET['id']);
    foreach($tampil AS $t){
?>
<form method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Berita Acara Penelitian Penawaran Harga (BAPPH)</h3>
            <h5>Nomor Surat</h5>
            <input class="form-control" type="text" name="nomor_bapph" required="required" value="<?=$t['nomor_bapph']?>">
            <h5>Tanggal Surat</h5>
            <input class="form-control" type="date" name="tanggal" required="required" value="<?=$t['tanggal_bapph']?>" id="tanggal">
            <h5>Hari Rapat</h5>
            <input class="form-control" type="text" required="required" value="<?=$t['hari_bapph']?>" id="hari" name="hari"> 
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
                echo $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
                echo $_POST['hari'];
                echo $_POST['nomor_bapph'];
                $status = $surat_bapph->insertBAPPH($_POST['nomor_bapph'],$tanggal,$_POST['hari'],$_GET['id']);
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
<!-- ajax Hari -->
<script>
    $(document).ready(function(){
        $("#tanggal").change(function(){
            var tanggal = $("#tanggal").val();
            $.ajax({
                type : 'POST',
                url : 'modul/surat/ajaxHari.php',
                data : 'tanggal='+tanggal,
                success: function(data){
                    $("#hari").val(data);
                }
            });
        })

    });
</script>
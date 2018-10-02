<?php
    $tampil = $surat_kontrak->tampilKontrak("WHERE id_surat = '$_GET[id_surat]'");
    foreach($tampil AS $t){
        $pisah = explode("/",$t['nomor_bappsph']);
        $nomor = (int)($pisah[0])+1;
        $gabungNomor = "0".$nomor;
        
        for($i=1;$i<6;$i++){
            $gabungNomor.="/".$pisah[$i];
        }
?>
<form method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Berita Acara Penelitian Penawaran Harga (BAPPH)</h3>
            <h5>Nomor Surat</h5>
            <input class="form-control" type="text" name="nomor_bapph" required="required" value=<?=$gabungNomor?>>
            <h5>Tanggal Surat</h5>
            <input class="form-control" type="date" name="tanggal" required="required" id="tanggal">
            <h5>Hari Rapat</h5>
            <input class="form-control" type="text" value="" required="required" id="hari" name="hari" id="hari"> 
            <br/>
            <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
        </div>
        <?php
    }
            if(isset($_POST['ok'])){
                echo $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
                echo $_POST['hari'];
                echo $_POST['nomor_bapph'];
                $status = $surat_bapph->insertBAPPH($_POST['nomor_bapph'],$tanggal,$_POST['hari'],$_GET['id_surat']);
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
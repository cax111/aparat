<?php
    $tampil = $surat_kontrak->tampilKontrak("WHERE id_surat = '$_GET[id_surat]'");
    foreach($tampil AS $t){
        $pisah = explode("/",$t['nomor_bapp']);
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
            <h3 class="box-title">Input Data Surat Perintah Kerja (SPK)</h3>
            <h5>Nomor Surat</h5>
            <input class="form-control" type="text" name="nomor" required="required" value=<?=$gabungNomor?>>
            <h5>Tanggal Surat</h5>
            <input class="form-control" type="date" name="tanggal" required="required" id="tanggal">
            <br/>
            <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
        </div>
        <?php
    }
            if(isset($_POST['ok'])){
                $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
                $status = $surat_sspk->insertSPK($_POST['nomor'],$tanggal,$_GET['id_surat']);
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
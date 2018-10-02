<form action="" method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
            <div class="box-header">
                <i class="fa fa-envelope"></i>
                <h3 class="box-title">Input Data Surat Owner Estimate(OE)</h3>
                <h5>Nomor Surat Owner Estimate</h5>
                <input class="form-control" type="text" name="nomor" placeholder="Nomor Surat" required="required" >
                <h5>Tanggal Surat Owner Estimate</h5>
                <input class="form-control" type="date" name="tanggal" required="required" >        
                <br/>
                <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
            </div>  

                <?php
                    if(isset($_POST['ok'])){
                        $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
                        $status = $surat_oe->insertOE($_POST['nomor'],$tanggal,$_GET['id_surat']);
                        
                        if($status=="Input Data Gagal."){
                ?>
                            <div class="box-footer clearfix label-danger">
                                <i class="fa fa-times"></i>
                                <?= $status ?>
                            </div> 
                <?php
                        }else{
                ?>
                            <div class="box-footer clearfix label-success">
                                <i class="fa fa-check"></i>
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
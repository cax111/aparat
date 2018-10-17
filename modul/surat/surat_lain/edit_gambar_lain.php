<?php
    $tampil = $barang->tampilBarang(" WHERE id_barang=$_GET[id_barang]");
        foreach($tampil AS $t){
?>
<form method="post" accept-charset="utf-8" enctype="multipart/form-data"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Update Gambar Barang dan Link Sumber untuk Surat Spesifikasi Teknis   </h3>
            <h5>Gambar Barang</h5>
            <input class="" type="file" name="gambar"  required="required" >
            <h5>Link Barang</h5>
            <input class="form-control" type="text" name="link" value="<?=$t['link']?>" placeholder="Link Gambar Barang" required="required" >                
            <br/>
              <label class="pull-left">
              <?php
                echo"<a class='btn btn-flat btn-warning' href='index.php?page=surat_pt&act=detail_surat_pt&id=$_GET[id_surat]'><i class='fa fa-arrow-circle-o-left'> </i> Kembali</a>";
              ?>
              </label> 
              <input class="btn btn-flat btn-success pull-right" type="submit" name="ok" value="Submit">
        </div>
        <?php
            $nama = $t['id_surat'].$t['id_barang']."-".$t['nama_barang'];
        }
            if(isset($_POST['ok'])){
                $nama2=$_FILES['gambar']['name'];
                $x = explode('.', $nama2);
                $ekstensi = strtolower(end($x));
                $nama = $nama.".".$ekstensi;
                $ukuran = $_FILES['gambar']['size'];
                $file_tmp = $_FILES['gambar']['tmp_name'];

                $status = $barang->uploadGambar($nama,$ekstensi,$ukuran,$file_tmp,$_POST['link'],$_GET['id_barang']);
                if($status!="FILE BERHASIL DI UPLOAD"){
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
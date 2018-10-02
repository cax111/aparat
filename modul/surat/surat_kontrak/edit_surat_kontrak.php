<?php
    $tampil = $surat_kontrak->tampilKontrak("WHERE id_surat = '$_GET[id]'");
    foreach($tampil AS $t){
      $tampilJurusan = $surat_kontrak->tampilJurusan2();
      $id_fak=null;
      foreach($tampilJurusan AS $tj){
        if($t['id_jurusan']==$tj['id_jurusan']){
          $id_fak=$tj['id_fakultas'];
        }
      }      
?>
<form action="" method="post" accept-charset="utf-8"> 
  <div id="form" style="display:none" class="box box-warning">
    <div class="box-header">
      <i class="fa fa-envelope"></i>

      <h3 class="box-title">Ubah Data Umum Surat Kontrak</h3> 
      <h5>Judul Surat</h5>
      <input class="form-control" type="text" name="judul_surat" value="<?=$t['judul_surat']?>" required="required" >
      <h5>Universitas</h5>
      <input class="form-control" type="text" name="nama_universitas" disabled value="Universitas Islam Sunan Gunung Djati Bandung" required="required" >
      <h5>Fakultas</h5>
        <select name="fakultas" id="fakultas" class="form-control" required="required">
          <option disabled="disabled" value=""> Pilih Fakultas </option>
          <?php
            $i=0;
            $tampilFakultas=$surat_kontrak->tampilFakultas(); 
            foreach($tampilFakultas AS $tf){
              if($tf['id_fakultas']==$id_fak){
                echo"<option selected='selected' value='$tf[id_fakultas]'>$tf[nama_fakultas]</option>";
              }else{
                echo"<option value='$tf[id_fakultas]'>$tf[nama_fakultas]</option>";
              }
            }
          ?>
        </select>
        <!-- ajaxjurusan -->
      <h5 id="jr">Jurusan</h5>
        <div id="jurusan">
          <?php
            $tampil = $surat_kontrak->tampilJurusan($id_fak);
            echo "<select name='jurusan' class='form-control' required>
                  <option disabled value=''> Pilih Jurusan </option>";
            foreach($tampil AS $tj){
              if($t['id_jurusan']==$tj['id_jurusan']){
                echo '  <option selected value="'.$tj['id_jurusan'].'">'.$tj['nama_jurusan'].'</option>';
              }else{
                echo '  <option value="'.$tj['id_jurusan'].'">'.$tj['nama_jurusan'].'</option>';
              }
            }
            echo "</select>";
          ?>
        </div>  
      <h5>Tahun Surat</h5>
      <input class="form-control" type="text" name="tahun_surat" value="<?=$t['tahun_surat']?>" required="required" >
      <h5>Nama Pejabat Pembuat Komitmen</h5>
      <input class="form-control" type="text" name="nama_ppk" value="<?=$t['nama_ppk']?>" required="required" >
      <h5>NIP Pejabat Pembuat Komitmen</h5>
      <input class="form-control" type="text" name="nip_ppk" value="<?=$t['nip_ppk']?>" required="required" >
      <h5>Nama Pokja Pengadaan Barang/Jasa</h5>
      <input class="form-control" type="text" name="nama_ppb" value="<?=$t['nama_ppb']?>" required="required" >
      <h5>NIP Pokja Pengadaan Barang/Jasa</h5>
      <input class="form-control" type="text" name="nip_ppb" value="<?=$t['nip_ppb']?>" required="required" >
      <br/>
      <br/>

      <label class="pull-left">
      <?php
        echo"<a class='btn btn-flat btn-warning' href='index.php?page=surat_kontrak&act=detail_surat_kontrak&id=$_GET[id]'><i class='fa fa-arrow-circle-o-left'> </i> Kembali</a>";
      ?>
      </label> 
      <input class="btn btn-flat btn-success pull-right" type="submit" name="ok" value="Submit">
     
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
<!-- ajax jurusan -->
<script>
    $(document).ready(function(){
        $("#fakultas").change(function(){
            var fakultas_id = $("#fakultas").val()
            $.ajax({
                type : 'GET',
                url : 'modul/surat/ajaxJurusan.php',
                data : 'fakultas_id='+fakultas_id,
                success: function(data){
                    $("#jurusan").html(data);
                    $("#jr").slideDown(1000);
                    $("#jurusan").slideDown(1000);
                }
            });
        })

    });
</script>
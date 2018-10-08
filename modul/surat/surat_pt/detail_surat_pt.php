<div class="box box-success" id="form" style="display:none">
  <div class="box-header with-border">
    <h3 class="box-title"> <i class="fa fa-envelope"></i> Detail Surat Perusahaan</h3>
  </div>
  <!-- /.box-header -->  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <?php
            $id_surat=mysql_real_escape_string($_GET['id']);
            $tampil=$surat_kontrak->tampilkontrak("WHERE id_surat='$id_surat'"); 
            foreach($tampil AS $t){
          ?>
          <tr>
            <th>ID</th>
            <td colspan="2"><?php echo ": ".$t['id_surat']; ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>Judul Surat</th>
            <td colspan="2"><?php echo ": ".$t['judul_surat']; ?></td>
          </tr> 
          <tr>
            <th>Nama Pejabat Pembuat Komitmen</th>
            <td colspan="2"><?php echo ": ".$t['nama_ppk']; ?></td>
          </tr> 
          <tr>
            <th>NIP Pejabat Pembuat Komitmen</th>
            <td colspan="2"><?php echo ": ".$t['nip_ppk']; ?></td>
          </tr> 
          <tr>
            <th>Nama Pokja Pengadaan Barang/Jasa</th>
            <td colspan="2"><?php echo ": ".$t['nama_ppb']; ?></td>
          </tr> 
          <tr>
            <th>NIP Pokja Pengadaan Barang/Jasa</th>
            <td colspan="2"><?php echo ": ".$t['nip_ppb']; ?></td>
          </tr>
          <tr>
            <th>Nama Panitia</th>
            <th colspan="2">Jabatan Panitia</th>
          </tr>
          <?php
            $i=0;
            $tampil = $surat_kontrak->tampilPanitia("WHERE id_surat='$t[id_surat]'");
            foreach($tampil AS $tp){
          ?>
          <tr>
            <td><?=$tp['nama_panitia'];?></td>
            <td colspan="2"><?=$tp['jabatan_panitia'];?></td>
          </tr> 
          <?php
              $nama_panitia[$i]=$tp['nama_panitia'];
              $jabatan_panitia[$i]=$tp['jabatan_panitia'];
              $i++;
            }
          ?>
          <tr>
            <th colspan="2">Surat - Surat</th>
            <th>Aksi </th>
          </tr>
          <tr>
            <th><div class="margin">Surat Penawaran Harga (PH)</div></th>
            <?php 
              $no_ph=null;
              $tampil=$surat_pt->tampilPT("WHERE id_surat=$_GET[id]");
              if(!empty($tampil)){
                foreach($tampil AS $tp){
                  if(empty($tp['nomor_ph'])){
                    echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                    <td>
                      <a href='index.php?page=surat_ph&pageParent=surat_pt&page=surat_ph&act=insert_surat_ph&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                    </td>"; 
                  }else{
                    $no_ph=$tp['nomor_ph'];
                    echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                    <td>
                      <a href='index.php?pageParent=surat_pt&page=surat_ph&act=detail_surat_ph&id=$_GET[id]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                      <a href='index.php?pageParent=surat_pt&page=surat_ph&act=edit_surat_ph&id=$_GET[id]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                    </td>";
                  }
                }
              }else{
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                  <td>
                    <a href='index.php?page=surat_ph&pageParent=surat_pt&page=surat_ph&act=insert_surat_ph&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                  </td>"; 
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Spesifikasi Teknis (ST)</div></th>
          </tr>
            <?php 
              $tampil=$barang->tampilBarang(" INNER JOIN spk ON spk.id_barang=barang.id_barang INNER JOIN pagu ON pagu.id_barang=barang.id_barang INNER JOIN penawaran ON penawaran.id_barang=barang.id_barang WHERE id_surat=$_GET[id] ");
              if(!empty($tampil)){
                foreach($tampil AS $tb){
                  if(empty($tb['gambar'])&&empty($tb['link'])){
                    echo"<tr>
                          <td>
                            $tb[nama_barang]
                          </td>
                          <td><div class='margin'><i class='fa fa-times'></i> Data Belum Diisi</div></td>                      
                          <td>
                            <a href='index.php?page=surat_pt&act=insert_gambar_pt&id_surat=$_GET[id]&id_barang=$tb[id_barang]' class='btn btn-sm btn-success btn-flat pull-left margin'>Isi data Surat</a>
                          </td>
                          </tr>"; 

                  }else{
                    echo"<tr>
                          <td>
                            $tb[nama_barang]
                          </td>
                          <td><div class='margin'><i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                          <td>
                            <a href='index.php?page=surat_pt&act=detail_gambar_pt&id_surat=$_GET[id]&id_barang=$tb[id_barang]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Gambar Barang</a>
                            <a href='index.php?page=surat_pt&act=edit_gambar_pt&id_surat=$_GET[id]&id_barang=$tb[id_barang]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Gambar Barang</a>
                          </td>
                        </tr>";
                  }
                }
              }else{
                echo"<tr> 
                      <td>
                      $tb[nama_barang]
                      </td>
                      <td><div class='margin'><i class='fa fa-times'></i> Data Belum Diisi</div></td>                      
                      <td>
                        <a href='index.php?page=surat_st&pageParent=surat_pt&page=surat_st&act=insert_surat_st&id_surat=$_GET[id]&id_barang=$tb[id_barang]' class='btn btn-sm btn-success btn-flat pull-left margin'>Isi data Surat</a>
                      </td>
                    </tr>"; 
              }
            ?>
          </tr> 
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <?php
      $i=0;
      $tampil=$barang->banyakBarang(" INNER JOIN spk ON spk.id_barang=barang.id_barang INNER JOIN pagu ON pagu.id_barang=barang.id_barang INNER JOIN penawaran ON penawaran.id_barang=barang.id_barang WHERE id_surat=$_GET[id] ");
      foreach($tampil AS $bb){
        $banyak_barang = $bb['hitung'];
      }
      
      if($banyak_barang==0){
        echo "<button class='btn btn-sm alert-danger btn-flat pull-right margin'>`  Silakan isi dulu barang yang akan dijual, untuk mendownload dokumennya.</button>";
      }else{
        $tampil=$barang->tampilBarang(" INNER JOIN spk ON spk.id_barang=barang.id_barang INNER JOIN pagu ON pagu.id_barang=barang.id_barang INNER JOIN penawaran ON penawaran.id_barang=barang.id_barang WHERE id_surat=$_GET[id] ");
        foreach($tampil AS $tb){
          $nama_barang[$i] = $tb['nama_barang'];
          $spesifikasi[$i] = $tb['spesifikasi'];
          $volume[$i] = $tb['volume'];
          $satuan[$i] = $tb['satuan'];
          $gambar[$i] = $tb['gambar'];
          $link[$i] = $tb['link'];
          $harga_dasar_hps[$i] =$tb['harga_dasar'];
          $harga_dasar_penawaran[$i] =$tb['harga_dasar_penawaran'];
          $harga_dasar_spk[$i] =$tb['harga_dasar_spk'];
          $keuntungan_hps[$i] =$tb['keuntungan_pagu'];
          $keuntungan_penawaran[$i] =$tb['keuntungan_penawaran'];
          $keuntungan_spk[$i] =$tb['keuntungan_spk'];
          $jumlah_keuntungan_hps[$i] =$tb['jumlah_keuntungan_pagu'];
          $jumlah_keuntungan_penawaran[$i] =$tb['jumlah_keuntungan_penawaran'];
          $jumlah_keuntungan_spk[$i] =$tb['jumlah_keuntungan_spk'];
          $ppn_hps[$i] =$tb['ppn_pagu'];
          $ppn_penawaran[$i] =$tb['ppn_penawaran'];
          $ppn_spk[$i] =$tb['ppn_spk'];
          $hps_hps[$i] =$tb['hps_pagu'];
          $hps_penawaran[$i] =$tb['hps_penawaran'];
          $hps_spk[$i] =$tb['hps_spk'];
          $total_harga_hps[$i] =$tb['total_harga_pagu'];
          $total_harga_penawaran[$i] =$tb['total_harga_penawaran'];
          $total_harga_spk[$i] =$tb['total_harga_spk'];

          $i++;
        }
        $tampil=$surat_kontrak->tampilKontrak("INNER JOIN (jurusan INNER JOIN (fakultas INNER JOIN universitas ON fakultas.id_universitas=universitas.id_universitas) ON jurusan.id_fakultas=fakultas.id_fakultas) ON surat_kontrak.id_jurusan=jurusan.id_jurusan INNER JOIN akun_user ON surat_kontrak.id_user=akun_user.id_user WHERE id_surat=$_GET[id]"); 
        foreach($tampil AS $t){
    ?>
      <form class="pull-right" method="POST" action="modul/surat/download_surat_pt.php">
        <!-- data surat umum -->
        <input type="hidden" name="judul" value="<?php echo $t['judul_surat'] ?>">
        <input type="hidden" name="nama_jurusan" value="<?php echo $t['nama_jurusan'] ?>">
        <input type="hidden" name="nama_fakultas" value="<?php echo $t['nama_fakultas'] ?>">
        <input type="hidden" name="nama_universitas" value="<?php echo $t['nama_universitas'] ?>">
        <input type="hidden" name="alamat_universitas" value="<?php echo $t['alamat_universitas'] ?>">
        <input type="hidden" name="nama_ppk" value="<?php echo $t['nama_ppk'] ?>">
        <input type="hidden" name="nip_ppk" value="<?php echo $t['nip_ppk'] ?>">
        <input type="hidden" name="nama_ppb" value="<?php echo $t['nama_ppb'] ?>">
        <input type="hidden" name="nip_ppb" value="<?php echo $t['nip_ppb'] ?>">
        <input type="hidden" name="tahun" value="<?php echo $t['tahun_surat'] ?>">
        <input type="hidden" name="nama_perusahaan" value="<?php echo $t['nama_perusahaan'] ?>">
        <input type="hidden" name="alamat_perusahaan" value="<?php echo $t['alamat_perusahaan'] ?>">
        <input type="hidden" name="direktur_perusahaan" value="<?php echo $t['nama_user'] ?>">
        <input type="hidden" name="npwp_perusahaan" value="<?php echo $t['npwp'] ?>">
        <input type="hidden" name="telp_perusahaan" value="<?php echo $t['no_telp'] ?>">
        <input type="hidden" name="email_perusahaan" value="<?php echo $t['email'] ?>">
        <!-- data persurat -->
        <input type="hidden" name="nomor_ph" value="<?php echo $no_ph ?>">
        <input type="hidden" name="tanggal_pph" value="<?php echo $t['tanggal_pph'] ?>">
        <input type="hidden" name="tanggal_penawaran_pph" value="<?php echo $t['tanggal_penawaran_pph'] ?>">
        <input type="hidden" name="tanggal_spk" value="<?php echo $t['tanggal_spk'] ?>">
        <input type="hidden" name="banyak_barang" value="<?php echo $banyak_barang ?>">
        <!-- harga Barang HPS - PENAWARAN - SPK -->
        <?php
          $bbarang=null;
          for($i=0;$i<$banyak_barang;$i++){
            echo "<input type='hidden' name='nama_barang"."$i' value='$nama_barang[$i]'>";
            echo "<input type='hidden' name='spesifikasi"."$i' value='$spesifikasi[$i]'>";
            echo "<input type='hidden' name='volume"."$i' value='$volume[$i]'>";
            echo "<input type='hidden' name='satuan"."$i' value='$satuan[$i]'>";
            echo "<input type='hidden' name='gambar"."$i' value='$gambar[$i]'>";
            echo "<input type='hidden' name='link"."$i' value='$link[$i]'>";
            echo "<input type='hidden' name='harga_dasar_hps"."$i' value='$harga_dasar_hps[$i]'>";
            echo "<input type='hidden' name='harga_dasar_penawaran"."$i' value='$harga_dasar_penawaran[$i]'>";
            echo "<input type='hidden' name='harga_dasar_spk"."$i' value='$harga_dasar_spk[$i]'>";
            echo "<input type='hidden' name='keuntungan_hps"."$i' value='$keuntungan_hps[$i]'>";
            echo "<input type='hidden' name='keuntungan_penawaran"."$i' value='$keuntungan_penawaran[$i]'>";
            echo "<input type='hidden' name='keuntungan_spk"."$i' value='$keuntungan_spk[$i]'>";
            echo "<input type='hidden' name='jumlah_keuntungan_hps"."$i' value='$jumlah_keuntungan_hps[$i]'>";
            echo "<input type='hidden' name='jumlah_keuntungan_penawaran"."$i' value='$jumlah_keuntungan_penawaran[$i]'>";
            echo "<input type='hidden' name='jumlah_keuntungan_spk"."$i' value='$jumlah_keuntungan_spk[$i]'>";
            echo "<input type='hidden' name='ppn_hps"."$i' value='$ppn_hps[$i]'>";
            echo "<input type='hidden' name='ppn_penawaran"."$i' value='$ppn_penawaran[$i]'>";
            echo "<input type='hidden' name='ppn_spk"."$i' value='$ppn_spk[$i]'>";
            echo "<input type='hidden' name='hps_hps"."$i' value='$hps_hps[$i]'>";
            echo "<input type='hidden' name='hps_penawaran"."$i' value='$hps_penawaran[$i]'>";
            echo "<input type='hidden' name='hps_spk"."$i' value='$hps_spk[$i]'>";
            echo "<input type='hidden' name='total_harga_hps"."$i' value='$total_harga_hps[$i]'>";
            echo "<input type='hidden' name='total_harga_penawaran"."$i' value='$total_harga_penawaran[$i]'>";
            echo "<input type='hidden' name='total_harga_spk"."$i' value='$total_harga_spk[$i]'>";
            $bbarang = $bbarang.$gambar[$i];
          }
          for($i=0;$i<6;$i++){
            echo "<input type='hidden' name='nama_panitia"."$i' value='$nama_panitia[$i]'>";
          }
          for($i=0;$i<6;$i++){
            echo "<input type='hidden' name='jabatan_panitia"."$i' value='$jabatan_panitia[$i]'>";
          }
          if(empty($no_ph)){
        ?>
            <button name='oke' disabled class='btn btn-sm btn-danger btn-flat pull-left margin'> Silakan isi dulu nomor surat penawaran harga</button>
      </form>
    <?php
          }elseif(empty($bbarang)){ 
           echo "<button name='oke' disabled class='btn btn-sm btn-danger btn-flat pull-left margin'> Silakan isi dulu gambar dan link tiap barang</button>";
          }else{
    ?>
            <input type="hidden" name="tipe_download" value="kontrak">
            <button name="oke" class="btn btn-sm btn-success btn-flat pull-left margin"> Download Surat Perusahaan</button>
    <?php
          }
        }   
      }
    ?>
  </div>
  <!-- /.box-footer -->
  <?php
    }
  ?>
</div>
<!-- /.box -->

<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){     
    $("#form").slideDown(1000);  
});
</script>
<!-- end animasi form
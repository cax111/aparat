
<?php

include "../../class/koneksi.php";
include "../../class/surat_pagu/class-surat_spk.php";
$surat_spk = new spk;



?>

<div id="form_tanda" class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Barang Yang Telah Mempunyai Harga Penawaran</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
            <tr>
              <th>ID</th>
              <th>Judul Surat</th>
              <th>Volume</th>
              <th>Harga Dasar Penawaran</th>
              <th>Total Penawaran</th>
            </tr>
        </thead>
        <tbody>
          <?php
              $id = $_GET['id'];
              //echo $id;
              $querytambahan = "INNER JOIN barang ON barang.id_barang=spk.id_barang";
              $tampil=$surat_spk->tampilspkbarang1($querytambahan,$id);
              if(!empty($tampil)){
                foreach($tampil AS $t){
          ?>
            <tr>
              <td>
                <a href=""><?php echo $t['id_barang']; ?></a>
              </td>
              <td>
                <?php echo $t['nama_barang']; ?>

              </td>
              <td>
                <?php echo $t['volume']; ?>
              </td>
              <td>
                 Rp. <?php echo $t['harga_dasar_spk']; ?>
              </td>
              <td>
                Rp. <?php echo $t['total_harga_spk']; ?>

              </td>
            </tr>

            <?php
                    }
                  }else{
              ?>
                    <tr>
                      <td colspan="3">Data Belum ada.</td>
                    </tr>
              <?php
                  }
              ?>
        </tbody>
      </table>

    </div>
    <!-- /.table-responsive -->
  </div>

  <!-- /.box-footer -->
</div>

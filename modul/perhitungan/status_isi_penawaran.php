
<?php

include "../../class/koneksi.php";
include "../../class/surat_pagu/class-surat_penawaran.php";
$surat_penawaran = new penawaran;



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
              $querytambahan = "INNER JOIN barang ON barang.id_barang=penawaran.id_barang";
              $tampil=$surat_penawaran->tampilpenawaranbarang1($querytambahan,$id);
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
                 Rp. <?php echo $t['harga_dasar_penawaran']; ?>
              </td>
              <td>
                Rp. <?php echo $t['total_harga_penawaran']; ?>

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

<!-- TABLE: LATEST ORDERS -->
          <div id="form_tanda" class="box box-success" style="display:none">
            <div class="box-header with-border">
              <h3 class="box-title">Surat HPS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Judul Surat</th>
                        <th>Banyak Barang</th>
                        <th>Total Harga HPS</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        $queryTambahan = "INNER JOIN jurusan ON jurusan.id_jurusan=surat_kontrak.id_jurusan INNER JOIN akun_user ON akun_user.id_user=surat_kontrak.id_user WHERE akun_user.id_user='$_SESSION[id_user_aparat]'";
                        $tampil=$surat_kontrak->tampilKontrak($queryTambahan);
                        if(!empty($tampil)){
                          foreach($tampil AS $t){
                    ?>
                      <tr>
                        <td>
                          <a href=""><?php echo $t['id_surat']; ?></a>
                        </td>
                        <td>
                          <?php echo $t['judul_surat']; ?>
                        </td>
                        <td>
                          <?php echo $t['nama_jurusan']; ?>
                        </td>
                        <td>
                          <?php echo $t['nama_perusahaan']; ?>
                        </td>
                        <td>
                            <a href="index.php?page_perhitungan=insert_pagu&id=<?php echo $t['id_surat'] ?>" class="btn btn-sm btn-success btn-flat pull-left">Lihat detail Surat</a>
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
          <!-- /.box -->

<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){
    $("#form_tanda").slideDown(1000);
});
</script>
<!-- end animasi form -->

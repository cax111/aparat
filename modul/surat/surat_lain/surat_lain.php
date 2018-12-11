<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Lain-lain</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Judul Surat</th>
                        <th>Jurusan</th>
                        <th>Perusahaan Pemegang Proyek</th>
                        <th>Status Surat Kontrak</th>
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
                          <?php echo $t['id_surat']; ?>
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
                          <?php 
                            if(!empty($t['nomor_oe'])&&!empty($t['nomor_pph'])&&!empty($t['nomor_bappsph'])&&!empty($t['nomor_bapph'])&&!empty($t['nomor_uknh'])&&!empty($t['nomor_baknh'])&&!empty($t['nomor_bahpl'])&&!empty($t['nomor_pp'])&&!empty($t['nomor_bapp'])&&!empty($t['nomor_spk'])&&!empty($t['nomor_sp'])&&!empty($t['nomor_bapb'])&&!empty($t['nomor_bastb'])&&!empty($t['nomor_bap'])){
                              echo"<p class='label label-success'>Surat Selesai</p>
                                </td>
                                <td>
                                    <a href='index.php?page=surat_lain&act=detail_surat_lain&id=$t[id_surat]' class=' form-control btn btn-sm btn-success btn-flat pull-left'>Lihat detail Surat</a>
                                </td>
                              ";
                            }else{
                              echo"<p class='label label-danger'>Surat Belum Selesai</p>
                                </td>
                                <td>
                                    <button class='btn btn-sm btn-danger btn-flat pull-left' disabled>Silakan isi Surat Kontrak</button>
                                </td>
                              ";
                            }
                          ?>
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
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="index.php?page=surat_kontrak&act=insert_surat_kontrak" class="btn btn-sm btn-success btn-flat pull-left">Tambah Surat Kontrak</a>
            </div>
             --><!-- /.box-footer -->
          </div>
          <!-- /.box -->

<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){     
    $("#form").slideDown(1000);
});
</script>
<!-- end animasi form -->
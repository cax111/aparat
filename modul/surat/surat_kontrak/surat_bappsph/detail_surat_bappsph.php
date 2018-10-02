<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Berita Acara Pemasukan/Pembukaan Surat Penawaran Harga</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>

                    <?php
                        $tampil=$surat_bappsph->tampilBAPPSPH($_GET['id']); 
                        foreach($tampil AS $t){
                    ?>
                  <tr>
                    <th>Nama Surat</th>
                    <td>: Surat Berita Acara Pemasukan/Pembukaan Surat Penawaran Harga (BAP/PSPH)</td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Nomor Surat</th>
                    <td><?php echo ": ".$t['nomor_bappsph']; ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Surat</th>
                    <td><?php echo ": ".$pengaturan->formatTanggal($t['tanggal_bappsph']); ?></td>
                  </tr>
                  <tr>
                    <th>Waktu Pengerjaan</th>
                    <td><?php echo ": ".$t['waktu_pengerjaan_bappsph']." Hari"; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                  <div class="pull-right">
                        <a href="http://localhost/aparatt/aparat/index.php?page=surat_kontrak&act=detail_surat_kontrak&id=<?=$_GET['id']?>" class="btn btn-sm btn-success btn-flat"><span class=""></span>Kembali</a>
                  </div>
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
<!-- end animasi form -->
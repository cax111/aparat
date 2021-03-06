<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Data Surat Berita Acara Permintaan Penawaran Harga</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>

                    <?php
                        $tampil=$surat_bapph->tampilBAPPH($_GET['id']); 
                        foreach($tampil AS $t){
                    ?>
                  <tr>
                    <th>Nama Surat</th>
                    <td>: Surat Berita Acara Permintaan Penawaran Harga (BAPPH)</td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Nomor Surat</th>
                    <td><?=": ".$t['nomor_bapph'];?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Surat</th>
                    <td><?=": ".$pengaturan->formatTanggal($t['tanggal_bapph'])?></td>
                  </tr>
                  <tr>
                    <th>Hari Pertemuan/Rapat</th>
                    <td><?=": ".$t['hari_bapph']?></td>
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
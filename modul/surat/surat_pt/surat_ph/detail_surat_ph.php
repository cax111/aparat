<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Data Surat Berita Acara Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>

                    <?php
                        $tampil=$surat_pt->tampilPT(" WHERE id_surat=$_GET[id]"); 
                        foreach($tampil AS $t){
                    ?>
                  <tr>
                    <th>Nama Surat</th>
                    <td>: Surat Penawaran Harga (PH)</td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Nomor Surat</th>
                    <td><?=": ".$t['nomor_ph']; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                  <div class="pull-right">
                        <a href="index.php?page=surat_pt&act=detail_surat_pt&id=<?=$_GET['id']?>" class="btn btn-sm btn-success btn-flat"><span class=""></span>Kembali</a>
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
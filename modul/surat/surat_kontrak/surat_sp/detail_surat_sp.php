<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Data Surat Pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>

                    <?php
                        $tampil=$surat_sp->tampilSP($_GET['id']); 
                        foreach($tampil AS $t){
                    ?>
                  <tr>
                    <th>Nama Surat</th>
                    <td>: Surat Pesanan (SP)</td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Nomor Surat</th>
                    <td><?=": ".$t['nomor_sp']; ?></td>
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
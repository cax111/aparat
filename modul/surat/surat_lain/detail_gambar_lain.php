<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Data Surat Berita Acara Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                    <?php
                        $tampil=$barang->tampilBarang(" WHERE id_barang='$_GET[id_barang]'"); 
                        foreach($tampil AS $t){
                    ?>
                  <tr>
                    <th>Nama Barang</th>
                    <td style="width:70%">: <?=$t['nama_barang']?></td>
                  </tr>
                  <tr>
                    <th>Spesifikasi Barang</th>
                    <td>: <?=$t['spesifikasi']; ?></td>
                  </tr>
                  <tr>
                    <th>Volume Barang</th>
                    <td>: <?=$t['volume']." Buah" ?></td>
                  </tr>
                  <tr>
                    <th>Tampilan Barang</th>
                    <td><img class="img-thumbnail" width="200" src="dist/img/<?=$t['gambar']?>"></td>
                  </tr>
                  <tr>
                    <th>Link Gambar Barang</th>
                    <td>: <?=$t['link'] ?></td>
                  </tr>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                  <div class="pull-right">
                        <a href="index.php?page=surat_lain&act=detail_surat_lain&id=<?=$_GET['id_surat']?>" class="btn btn-sm btn-success btn-flat"><span class=""></span>Kembali</a>
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
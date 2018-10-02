
  <!-- TABLE: LATEST ORDERS -->
<?php
include "../../../class/koneksi.php";
include "../../../class/surat_pagu/class-surat_hps.php";
$surat_hps = new hps;

?>

            <div id="form_tanda" class="box box-success" >
              <div class="box-header with-border">
                <h3 class="box-title">Barang dan Harga</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Barang</th>
                          <th>Volume Barang</th>
                          <th>Total Harga </th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                          $id = $_GET['id'];
                          $querytambahan = "INNER JOIN barang ON barang.id_barang=pagu.id_barang";
                          $tampil=$surat_hps->tampilbarang($querytambahan,$id);
                          if(!empty($tampil)){
                            foreach($tampil AS $t){
                      ?>
                        <tr id="<?php echo $t['id_barang']; ?>">
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
                             Rp. <?php echo $t['total_harga_pagu']; ?>
                          </td>
                          <td>
                              <button class="btn btn-danger btn-sm remove">Delete</button>
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



            <script type="text/javascript">
                $(".remove").click(function(){
                    var id = $(this).parents("tr").attr("id");


                    if(confirm('Are you sure to remove this record ?'))
                    {
                        $.ajax({
                           url: 'modul/perhitungan/php/delete.php',
                           type: 'GET',
                           data: {id: id},
                           error: function() {
                              alert('Ada Kesalahan Dalam Menghapus');
                           },
                           success: function(data) {
                                $("#"+id).remove();
                                alert("Barang Berhasil Dihapus");
                           }
                        });
                    }
                });


            </script>

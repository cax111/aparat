


          <div id="form_tanda" class="box box-success" style="display:none">
            <div class="box-header with-border">
              <h3 class="box-title">Barang dan Harga Penawaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">

                <select name="fakultas" id="id_pagu" class="form-control" required="required">
                    <option selected="selected" disabled="disabled" value=""> Pilih Barang </option>
                    <?php
                    $id = $_GET['id'];
                    $querytambahan = "INNER JOIN barang ON barang.id_barang=pagu.id_barang";
                        $tampil=$surat_penawaran->tampilpenawaran($querytambahan,$id);
                        foreach($tampil AS $t){

                            ?>
                            <option value='<?php echo $t['nama_barang']; ?>'><?php echo $t['nama_barang'];  ?></option>

                          <?php
                        }
                    ?>


                </select>


                          <div id="return">

                          </div>


              </div>
              <!-- /.table-responsive -->
            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- <input type="text" name="" id="id_pagu" value=2> -->

          <div id="tampil_isi">

          </div>






<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){
    $("#form_tanda").slideDown(1000);


});
</script>
<!-- end animasi form -->




<script>

$(document).ready(function(){
    $("#id_pagu").change(function(){
        var id_pagu = $("#id_pagu").val()
        $.ajax({
            type : 'GET',
            url : 'modul/perhitungan/insert_penawaran.php',
            data : 'id_pagu='+id_pagu,
            success: function(data){

              $("#return").html(data);
              $("#tampil_isi").load("modul/perhitungan/status_isi_penawaran.php?id=<?php echo $_GET['id']; ?>").hide();



            }
        });
    })
    $("#tampil_isi").load("modul/perhitungan/status_isi_penawaran.php?id=<?php echo $_GET['id']; ?>");


});

</script>

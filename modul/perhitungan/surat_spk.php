


          <div id="form_tanda" class="box box-success" >
            <div class="box-header with-border">
              <h3 class="box-title">Barang dan Harga SPK</h3>
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
                          $id2 = $t['id_barang'];
                          $tampil_penawaran=$surat_spk->tampilsuratpenawaran($id2);
                          $tampil_spk=$surat_spk->tampildatasuratspk($id2);
                          $tampil_penawaran->setFetchMode(PDO::FETCH_ASSOC);
                          $tampil_spk->setFetchMode(PDO::FETCH_ASSOC);

                          $t2 = $tampil_penawaran->fetch();
                          $t3 = $tampil_spk->fetch();

                          if(isset($t2['id_barang'])){

                            if($t2['harga_dasar_penawaran']<=$t3['harga_dasar_spk'] ){
                              ?>

                              <option style="color:blue;" value='<?php echo $t['nama_barang']; ?>'>  <?php echo $t['nama_barang'];  ?> </option>

                              <?php
                            }else{
                              ?>
                              <option value='<?php echo $t['nama_barang']; ?>'><?php echo $t['nama_barang'];  ?></option>

                              <?php

                            }
                          }


                          else{
                            ?>


                            <option style="color:red;" value='<?php echo $t['nama_barang']; ?>'>  <?php echo $t['nama_barang'];  ?> </option>

                            <?php
                          }

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
    //$("#form_tanda").slideDown(1000);


});
</script>
<!-- end animasi form -->




<script>

$(document).ready(function(){
    $("#id_pagu").change(function(){
        var id_pagu = $("#id_pagu").val()
        $.ajax({
            type : 'GET',
            url : 'modul/perhitungan/insert_spk.php',
            data : 'id_pagu='+id_pagu,
            success: function(data){

              $("#return").html(data);
              $("#tampil_isi").load("modul/perhitungan/status_isi_spk.php?id=<?php echo $_GET['id']; ?>").hide();



            }
        });
    })
    $("#tampil_isi").load("modul/perhitungan/status_isi_spk.php?id=<?php echo $_GET['id']; ?>");



});

</script>

<?php


include "../../class/koneksi.php";
include "../../class/surat_pagu/class-surat_penawaran.php";
$surat_penawaran = new penawaran;


?>



    <div class="box-header col-md-8 col-lg-8">


<table class="table no-margin">
  <thead>
      <tr>
        <th>ID</th>
        <th>Judul Surat</th>
        <th>Satuan</th>
        <th>Total Harga HPS</th>
        <th>Total Penawaran</th>
      </tr>
  </thead>
  <tbody>
    <?php
        $id = $_GET['id_pagu'];
        //echo $id;
        $querytambahan = "INNER JOIN barang ON barang.id_barang=pagu.id_barang";
        $tampil=$surat_penawaran->tampilpenawaranbarang($querytambahan,$id);
        if(!empty($tampil)){
          foreach($tampil AS $t){
    ?>
      <tr>
        <td>
          <a href=""><?php echo $t['id_barang']; ?></a>
        </td>
        <td>
          <?php echo $t['nama_barang']; ?>

        </td>
        <td>
          <?php echo $t['satuan']; ?>
        </td>
        <td>
           Rp. <?php echo $t['total_harga_pagu']; ?>
        </td>
        <td>
          <div id="status_penawaran">

          </div>
        </td>
      </tr>


  </tbody>
</table>




  <input type="hidden" name="" id="id_barang" value="<?php echo $t['id_barang']; ?>">
                <h5>Nama Barang</h5>
                <input class="form-control" type="text" name="nama_barang" readonly id="nama_barang" required="required" value="  <?php echo $t['nama_barang']; ?>">
                <h5>Spesifikasi Barang</h5>
                <input class="form-control" type="text" name="spesifikasi" id="spesifikasi" readonly value="<?php echo $t['spesifikasi'] ?>"   required="required" >
                <h5>Harga Dasar Sebelumnya</h5>
                <input class="form-control" type="text" name="dasar" id="harga_dasar_hps"  readonly value="<?php echo $t['harga_dasar'] ?>" required="required" >
                <h5>Harga Dasar Penawaran</h5>
                <input class="form-control" type="text" name="dasar" id="harga_dasar"   required="required" >
                <div id="peringatan">

                </div>

				        <h5>Volume Barang</h5>

                <input class="form-control" type="text" name="banyak" id="banyak"  readonly value="<?php echo $t['volume'] ?>" required="required" onkeyup="perhitungan()">

                    <div id="peringatan2" style="display:none;">

                    </div>
<hr>

              <input type="submit" class="form-control  btn-success" id="submit"  >


    </div>




    <div class="box-header col-md-4 col-lg-4">


                <i class="fa fa-envelope"></i>
                <h3 class="box-title">Kalkulator Surat Pagu</h3>
                <h5>Harga Dasar</h5>
                <input class="form-control" type="text" name="" id="harga_dasar_barang" readonly required="required" >

                <h5>Keuntungan</h5>
                <input class="form-control" type="text" name="" id="keuntungan" readonly required="required" >
                <small style="color: red">*Keuntungan 10%</small>
                <h5>Jumlah</h5>
                <input class="form-control" readonly type="text" id="jumlah" name="" required="required" >
                <h5>PPN</h5>
                <input class="form-control" type="text" name="" id="ppn" readonly required="required" >
                <small style="color: red">*PPN 10%</small>
             	<h5>Jumlah HPS</h5>
                <input class="form-control" readonly type="text" name="" id="penawaran_total" required="required" >
                <h5>Total Harga</h5>
                <input class="form-control" readonly type="text" name=""  id="total" required="required" >


                <input type="hidden" name="" value=""id="cek">

    </div>
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







    <script src="build/js/jquery.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){

      $("#harga_dasar").keyup(function(){
              var isi = parseInt($("#harga_dasar").val());
                var volume = $("#banyak").val();
            $("#harga_dasar_barang").val(isi);
              var harga_dasar = parseInt($("#harga_dasar_barang").val());
              var keuntungan = parseInt(harga_dasar * 0.1 );
              var jumlah = parseInt(harga_dasar+keuntungan);
              var ppn = parseInt(jumlah * 0.1);
              var total = parseInt(jumlah+ppn);
              var total_keseluruhan = parseInt(total * volume);

            $("#keuntungan").val(keuntungan);
            $("#jumlah").val(jumlah);
            $("#ppn").val(ppn);
            $("#penawaran_total").val(total);
            $("#total").val(total_keseluruhan);

            var harga_dasar_hps = $("#harga_dasar_hps").val();
            var id_barang = $("#id_barang").val();

            if(isi >= harga_dasar_hps){
                $("#harga_dasar").css("background-color", "#FA8072");
                $('#peringatan').html('<small style="color:red;">*Harga penawaran tidak boleh lebih besar</small>');
                $('#peringatan').show(1000);
                $("#cek").val("");
            }else if(isi < harga_dasar_hps){
              $("#harga_dasar").css("background-color", "white");
              $('#peringatan').hide(1000);
              $("#cek").val("benar");


            }


      });






      $("#submit").on('click', function() {

          var harga_dasar = $("#harga_dasar_barang").val();
          var keuntungan = $("#keuntungan").val();
          var jumlah = $("#jumlah").val();
          var ppn = $("#ppn").val();
          var total = $("#penawaran_total").val();
          var total_keseluruhan = $("#total").val();

      var harga_dasar_hps = $("#harga_dasar_hps").val();
      var id_barang = $("#id_barang").val();
          var cek = $("#cek").val();
        if( cek == "" || harga_dasar == ""){
          $('#peringatan2').html('<small style="color:red;">*data gagal input</small>');
          $('#peringatan2').show(1000);
          $('#peringatan2').hide(1000);



        }else{
          $.ajax({
                    type : "POST",
                    url  : "modul/perhitungan/php/input_penawaran.php",
                    //dataType : "JSON",
                    data : "harga_dasar="+harga_dasar+"&id_barang="+id_barang+"&keuntungan="+keuntungan+"&jumlah="+jumlah+"&ppn="+ppn+"&total="+total+"&total_keseluruhan="+total_keseluruhan,
                    success: function(){
                      $('#peringatan2').html('<small style="color:green;">*data berhasil input</small>');
                      $('#peringatan2').show(1000);
                      $('#peringatan2').hide(1000);
                      $('#status_penawaran').load("modul/perhitungan/status_penawaran.php?id="+id_barang);



                    }

          });
        }



      });

      var id_barang = $("#id_barang").val();

        $('#status_penawaran').load("modul/perhitungan/status_penawaran.php?id="+id_barang);



        });

    </script>

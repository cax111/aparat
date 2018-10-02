
    <div class="box-header col-md-8 col-lg-8">
 	  <div id="form" style="display:none" class="box box-success">
            <div class="box-header">
              <input type="hidden"  id="id_surat"  name="id_surat" value=<?php echo $_GET['id']; ?>  >
                <i class="fa fa-envelope"></i>
                <h3 class="box-title">Kebutuhan Surat Pagu</h3>

                <h5>Nama Barang</h5>
                <input class="form-control" type="text" name="nama_barang" id="nama_barang" required="required" >
                <h5>Spesifikasi Barang</h5>
                <input class="form-control" type="text" name="spesifikasi" id="spesifikasi"   required="required" >
                <h5>Satuan</h5>
                    <select id="satuan" >
                 	  <option selected disabled value="">Pilih Satuan</option>
                      <?php
                        $tampil = $pagu->tampilSatuan();
                        foreach($tampil AS $t){
                      ?>
                            <option value="<?php echo $t['nama_satuan'] ?>"><?=$t['nama_satuan']?></option>
                      <?php
                        }
                      ?>
					</select>

                <h5>Harga Dasar</h5>
                <input class="form-control" type="text" name="dasar" id="harga_dasar"  required="required" onkeyup="perhitungan()">
                <small style="color: red">*Jika ingin merubah harga klik PPN </small>


				<h5>Volume Barang</h5>
                <input class="form-control" type="text" name="banyak" id="banyak"  required="required" onkeyup="perhitungan()">

                <h5>Termasuk PPN dari Pelapak</h5>
				 <label class="radio-inline">
				      <input type="radio" id="ppny" value="1" name="optradio" onclick="perhitungan()">ya
				    </label>
				    <label class="radio-inline">
				      <input type="radio" id="ppnt" value="0" name="optradio" onclick="perhitungan()">tidak
				    </label>
				    <small style="margin-left:10px; color: red;">*PPN 10%</small>
            </div>
            <div class="box-footer clearfix">
              <input class="btn btn-success pull-right" type="submit" id="ok">
              <input class="btn btn-danger" type="reset" value="Reset">
          </div>
        </div>
        <div id="peringatan" style="display:none;">

        </div>
        <div id="return">

        </div>

    </div>




    <div class="box-header col-md-4 col-lg-4">
        <div id="form2" style="display:none" class="box box-danger">
            <div class="box-header">
                <i class="fa fa-envelope"></i>
                <h3 class="box-title">Kalkulator Surat Pagu</h3>
                <h5>Volume Barang</h5>
                <input class="form-control" type="text" name="" id="banyak_barang" readonly required="required" >
                <h5>Harga Dasar</h5>
                <input class="form-control" type="text" name="" id="harga_dasar_barang" readonly required="required" >
                <h5>Keuntungan</h5>
                <input class="form-control" type="text" name="" id="ppn" readonly required="required" >
                <small style="color: red">*Keuntungan 10%</small>
                <h5>Jumlah</h5>
                <input class="form-control" readonly type="text" id="jumlah" name="" required="required" >
                <h5>PPN</h5>
                <input class="form-control" type="text" name="" id="keuntungan" readonly required="required" >
                <small style="color: red">*PPN 10%</small>
             	<h5>Jumlah HPS</h5>
                <input class="form-control" readonly type="text" name="hps" id="hps" required="required" >
                <h5>Total Harga</h5>
                <input class="form-control" readonly type="text" name=""  id="total" required="required" >

            </div>

        </div>
    </div>











<script src="build/js/jquery.js"></script>
<!-- animasi slide form -->
<script>
$(document).ready(function(){
    $("#form").slideDown(1000);
    $("#form2").slideDown(1000);
    $("#form3").slideDown(1000);

});
</script>
<!-- end animasi -->
<script>
    function perhitungan(){
        if (document.getElementById('ppny').checked) {

            var harga_dasar  = parseInt(document.getElementById("harga_dasar").value);
            var vol  = parseInt(document.getElementById("banyak").value);
            var ppn = harga_dasar * 0.1;
            var harga_ppn = harga_dasar - ppn;
            document.getElementById("harga_dasar_barang").value = harga_ppn;
            var harga_temp  = parseInt(document.getElementById("harga_dasar_barang").value);
            var ppn2 = harga_temp * 0.1;
            var jumlah = ppn2 + harga_temp;
            var keuntungan = jumlah * 0.1;
            var hps = keuntungan+jumlah;
            var total = hps * vol;

             // var a_vol = vol.toFixed(0);
             // var a_ppn2 = ppn2.toFixed(0);

          document.getElementById("banyak_barang").value = vol.toFixed(0);
            document.getElementById("ppn").value = ppn2.toFixed(0);
            document.getElementById("jumlah").value = jumlah.toFixed(0);
            document.getElementById("keuntungan").value = keuntungan.toFixed(0);
            document.getElementById("hps").value = hps.toFixed(0);
            document.getElementById("total").value = total.toFixed(0);


        }else if (document.getElementById('ppnt').checked) {

            var harga_dasar  = parseInt(document.getElementById("harga_dasar").value);
            var vol  = parseInt(document.getElementById("banyak").value);
            var ppn = harga_dasar*0.1;
            var jumlah = ppn + harga_dasar;
            var keuntungan = jumlah*0.1;
            var hps=keuntungan+jumlah;
            var total=hps*vol;

            document.getElementById("banyak_barang").value = vol.toFixed(0);
            document.getElementById("harga_dasar_barang").value = harga_dasar.toFixed(0);
            document.getElementById("ppn").value = ppn.toFixed(0);
            document.getElementById("jumlah").value = jumlah.toFixed(0);
            document.getElementById("keuntungan").value = keuntungan.toFixed(0);
            document.getElementById("hps").value = hps.toFixed(0);
            document.getElementById("total").value = total.toFixed(0);
        }
    }



      $(document).ready(function() {
        $("#ok").on('click', function() {
          var harga_dasar_1 = $('#harga_dasar').val();
          var nama_barang = $('#nama_barang').val();
          var spesifikasi  = $('#spesifikasi').val();
          var satuan = $('#satuan').val();
          var banyak = $('#banyak').val();


          var id_surat = $('#id_surat').val();
          var harga_dasar = $('#harga_dasar_barang').val();
          var keuntungan = $('#ppn').val();
          var jumlah = $('#jumlah').val();
          var ppn = $('#keuntungan').val();
          var hps = $('#hps').val();
          var total = $('#total').val();


          if(harga_dasar_1 == '' || nama_barang == '' || spesifikasi == '' || satuan == '' || banyak == '' ){
            $('#peringatan').html('<small style="color:red;">*isian tidak boleh kosong</small>');
            $('#peringatan').show(1000);
            $('#peringatan').hide(1000);
          }else if(harga_dasar == '' || keuntungan == '' || jumlah == '' || ppn == '' || hps == '' || total == ''){
            $('#peringatan').html('<small style="color:red;">*klik tombol ppn</small>');
            $('#peringatan').show(1000);
            $('#peringatan').hide(1000);
          }
          else{
            $.ajax({
                      type : "POST",
                      url  : "modul/perhitungan/php/input_hps.php",
                      //dataType : "JSON",
                      data : "nama_barang="+nama_barang+"&spesifikasi="+spesifikasi+"&satuan="+satuan+"&banyak="+banyak+"&id_surat="+id_surat+"&harga_dasar="+harga_dasar+"&keuntungan="+keuntungan+"&jumlah="+jumlah+"&ppn="+ppn+"&hps="+hps+"&total="+total,
                      success: function(){

                        $('#return').load('modul/perhitungan/php/tanda.php?id=<?php echo $_GET['id']; ?>');
                        $('#peringatan').html('<small style="color:green;">*data masuk</small>');
                        // $('#peringatan').show(1000);
                        // $('#peringatan').hide(1000);
                        // $('#harga_dasar').val("");
                        // $('#nama_barang').val("");
                        // $('#spesifikasi').val("");
                        // $('#satuan').val("");
                        // $('#banyak_barang').val("");
                        // $('#banyak').val("");
                        // $('#id_surat').val("");
                        // $('#harga_dasar_barang').val("");
                        // $('#ppn').val("");
                        // $('#jumlah').val("");
                        // $('#keuntungan').val("");
                        // $('#hps').val("");
                        // $('#total').val("");


                      }

            });
          }
        });
        $('#return').load('modul/perhitungan/php/tanda.php?id=<?php echo $_GET['id']; ?>');


      });

</script>

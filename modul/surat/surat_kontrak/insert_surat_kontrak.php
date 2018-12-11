<form method="post" accept-charset="utf-8"> 
    <div id="form" style="display:none" class="box box-success">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Input Data Umum Surat Kontrak</h3>
            <h5>Judul Surat</h5>
            <input class="form-control" type="text" name="judul" placeholder="Judul Surat Kontrak" required="required" >
            <h5>Univesitas</h5>
            <input class="form-control" type="text" disabled name="universitas" value="Univesitas Islam Negeri Sunan Gunung Djati" required="required" >                
            <h5>Fakultas</h5>
            <select name="fakultas" id="fakultas" class="form-control" required="required">
                <option selected="selected" disabled="disabled" value=""> Pilih Fakultas </option>
                <?php
                    $tampil=$surat_kontrak->tampilFakultas(); 
                    foreach($tampil AS $t){
                        echo"<option value='$t[id_fakultas]'>$t[nama_fakultas]</option>";
                    }
                ?>
            </select>
            <!-- ajaxjurusan -->
            <h5 style="display:none" id="jr">Jurusan</h5>
            <div style="display:none" id="jurusan"></div>
            <!-- end ajaxjurusan -->  
            <h5>Tipe Pagu Surat</h5>
            <select class="form-control" name="tipe_pagu" required="required">
                <option selected value="" disabled="">silakan isi tipe pagu</option>
                <option value="BOPTN">BOPTN</option>
                <option value="DIPA">DIPA</option>
            </select>
            <h5>Nama Pejabat Pembuat Komitmen</h5>
            <input class="form-control" type="text" name="nama_ppk" placeholder="Nama PPK" required="required" >
            <h5>NIP Pejabat Pembuat Komitmen</h5>
            <input class="form-control" type="text" name="nip_ppk" placeholder="NIP PPK" required="required" >
            <h5>Nama Pokja Pengadaan Barang/Jasa</h5>
            <input class="form-control" type="text" name="nama_ppb" placeholder="Nama PPB" required="required" >
            <h5>NIP Pokja Pengadaan Barang/Jasa</h5>
            <input class="form-control" type="text" name="nip_ppb" placeholder="NIP PPB" required="required" >
            <h5>Nama Ketua Panitia Peneliti Harga</h5>
            <input class="form-control" type="text" name="kpph" placeholder="Nama Ketua Panitia Peneliti Harga" required="required" >
            <h5>Nama Sekretaris Panitia Peneliti Harga</h5>
            <input class="form-control" type="text" name="spph" placeholder="Nama Sekretaris Panitia Peneliti Harga" required="required" >
            <h5>Nama Anggota Panitia Peneliti Harga</h5>
            <input class="form-control" type="text" name="apph" placeholder="Nama Anggota Panitia Peneliti Harga" required="required" >
            <h5>Nama Panitia Penerima Hasil Pekerjaan 1</h5>
            <input class="form-control" type="text" name="pphp1" placeholder="Nama Panitia Penerima Hasil Pekerjaan 1" required="required" >
            <h5>NIP Panitia Penerima Hasil Pekerjaan 1</h5>
            <input class="form-control" type="text" name="npphp1" placeholder="Nip Panitia Penerima Hasil Pekerjaan 1" required="required" >
            <h5>Nama Panitia Penerima Hasil Pekerjaan 2</h5>
            <input class="form-control" type="text" name="pphp2" placeholder="Nama Panitia Penerima Hasil Pekerjaan 2" required="required" >
            <h5>Nama Panitia Penerima Hasil Pekerjaan 3</h5>
            <input class="form-control" type="text" name="pphp3" placeholder="Nama Panitia Penerima Hasil Pekerjaan 3" required="required" >
            <br/>
            <input class="form-control btn btn-success" type="submit" name="ok" value="Submit">
        </div>
        <?php
            if(isset($_POST['ok'])){
                $status = $surat_kontrak->insertKontrak($_POST['judul'],
                                                        $_POST['jurusan'],
                                                        $_SESSION['id_user_aparat'],
                                                        date('Y'),
                                                        $_POST['tipe_pagu'],
                                                        $_POST['nama_ppk'],
                                                        $_POST['nip_ppk'],
                                                        $_POST['nama_ppb'],
                                                        $_POST['nip_ppb'],
                                                        $_POST['kpph'],
                                                        $_POST['spph'],
                                                        $_POST['apph'],
                                                        $_POST['pphp1'],
                                                        $_POST['npphp1'],
                                                        $_POST['pphp2'],
                                                        $_POST['pphp3']);
                if($status=="Input Data Gagal."){
        ?>
                    <div class="box-footer clearfix label-danger">
                        <i class="fa fa-times"></i>
                        <?= $status ?>
                    </div> 
        <?php
                }else{
                    header("location:index.php?page=surat_kontrak");
                }
            }
        ?>         
    </div>
</form>

<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){     
    $("#form").slideDown(1000);
});
</script>
<!-- end animasi form -->
<!-- ajax jurusan -->
<script>
    $(document).ready(function(){
        $("#fakultas").change(function(){
            var fakultas_id = $("#fakultas").val()
            $.ajax({
                type : 'GET',
                url : 'modul/surat/ajaxJurusan.php',
                data : 'fakultas_id='+fakultas_id,
                success: function(data){
                    $("#jurusan").html(data);
                    $("#jr").slideDown(1000);
                    $("#jurusan").slideDown(1000);
                }
            });
        })

    });
</script>
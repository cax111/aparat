<div class="container-fluid">
<div class="col-md-12">
	<div style="background-color:#fff" class="jumbotron jumbotron-fluid">
	  <h2 class="display-4">Selamat Datang</h2>
	  <p class="lead">Ini adalah aplikasi aparat, yang merupakan kepanjangan dari <b>Aplikasi Pembuatan Surat</b></p>
	  <hr class="my-4">
	  <p class="lead">
	 	Tujuan dari aplikasi ini yaitu membuat pembuatan surat menjadi otomatis dengan menerima input yang diperlukan.
	  </p>
	  <p class="lead">	
	  		Aplikasi ini terdiri dari 4 halaman menu utama yaitu :
	  	<ul class="lead">
	  		<li>Halaman Awal / Index</li>
	  		<li>Halaman Pengisian data dan Pembuatan Surat</li>
	  		<li>Halaman Pengisian Data dan Perhitungan Harga Barang untuk Surat</li>
	  		<li>Halaman Profil Pengguna</li>
	  	</ul>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-lg" href="index.php?page=surat_kontrak" role="button">Mulai Membuat Surat</a>
	  </p>
	</div>
</div>
<div class="col-md-6">
	<!-- TABLE: LATEST ORDERS -->
          <div id="form" class="box box-success" style="display:none">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Kontrak Yang Belum Selesai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Judul Surat</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    	$i=0;
                    	$id_surat[]=null;
                    	$judul_surat[]=null;
                        $queryTambahan = "INNER JOIN jurusan ON jurusan.id_jurusan=surat_kontrak.id_jurusan INNER JOIN akun_user ON akun_user.id_user=surat_kontrak.id_user WHERE akun_user.id_user='$_SESSION[id_user_aparat]'";
                        $tampil=$surat_kontrak->tampilKontrak($queryTambahan);

                        if(!empty($tampil)){ 
                        	foreach($tampil AS $t){
                            	if(!empty($t['nomor_oe'])&&!empty($t['nomor_pph'])&&!empty($t['nomor_bappsph'])&&!empty($t['nomor_bapph'])&&!empty($t['nomor_uknh'])&&!empty($t['nomor_baknh'])&&!empty($t['nomor_bahpl'])&&!empty($t['nomor_pp'])&&!empty($t['nomor_bapp'])&&!empty($t['nomor_spk'])&&!empty($t['nomor_sp'])&&!empty($t['nomor_bapb'])&&!empty($t['nomor_bastb'])&&!empty($t['nomor_bap'])){
                        				$id_surat[$i]=$t['id_surat'];
                        				$judul_surat[$i]=$t['judul_surat'];
                        				$i++;
                            	}else{
                    ?>
    			                      <tr>
    			                        <td>
    			                          <?php echo $t['id_surat']; ?>
    			                        </td>
    			                        <td>
    			                          <?php echo $t['judul_surat']; ?>
    			                        </td>
    			                        <td>
    			                            <a href="index.php?page=surat_kontrak&act=detail_surat_kontrak&id=<?php echo $t['id_surat'] ?>" class="btn btn-sm btn-success btn-flat pull-left">Lihat detail Surat</a>
    			                        </td>
    			                      </tr>
                    <?php
                    			    }
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
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="index.php?page=surat_kontrak&act=insert_surat_kontrak" class="btn btn-sm btn-success btn-flat pull-left">Tambah Surat Kontrak</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	</div>
	<div class="col-md-6">
<!-- TABLE: LATEST ORDERS -->
          <div id="form2" class="box box-success" style="display:none">
            <div class="box-header with-border">
              <h3 class="box-title">Keuntungan Dari Surat Yang telah Selesai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>Judul Surat</th>
                        <th>Keuntungan</th>
                      </tr>
                  </thead>
                  <tbody>
		<?php
			$jumlah_keuntungan=0;
			for($j=0;$j<$i;$j++){
					$jumlah_keuntungan_surat=0;
					echo "<tr><td>".$id_surat[$j]."</td>";
					echo "<td>".$judul_surat[$j]."</td>";
				  $tampil = $barang->tampilBarang(" WHERE id_surat=$id_surat[$j]");

				foreach($tampil AS $tb){
					$tampil = $surat_spk->tampilhargaspk($tb['id_barang']);
					foreach($tampil AS $ts){
						$jumlah_keuntungan_surat += $ts['keuntungan_spk']*$tb['volume'];
					}
				}
				$jumlah_keuntungan += $jumlah_keuntungan_surat;
				echo "<td>Rp.".$pengaturan->formatUang($jumlah_keuntungan_surat)."</td></tr>";
			}
					echo"<tr>
						<td colspan='2'>Jumlah Keuntungan</td>
						<td>Rp.".$pengaturan->formatUang($jumlah_keuntungan)."</td>
					</tr>";
        if($jumlah_keuntungan==0){
					echo"<tr>
					<td colspan='3'>Terbilang : <br/><i>Belum ada</i></td>
					</tr>";
        }else{
          echo"<tr>
            <td colspan='3'>Terbilang : <br/><i>".$pengaturan->penyebut($jumlah_keuntungan)." Rupiah</i></td>
          </tr>";
        }
		?>
				  </tbody>
				</table>
			</div>
		  </div>
		</div>
	</div>
</div>
<script src="build/js/jquery.js"></script>
<!-- animasi form -->
<script>
$(document).ready(function(){     
    $("#form").slideDown(1000);
});
</script>
<script>
$(document).ready(function(){     
    $("#form2").slideDown(1000);
});
</script>
<!-- end animasi form -->
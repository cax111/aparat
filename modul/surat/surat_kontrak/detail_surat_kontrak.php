<div class="box box-success" id="form" style="display:none">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-envelope"></i> Surat Kontrak</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <?php
            $id_surat=mysql_real_escape_string($_GET['id']);
            $tampil=$surat_kontrak->tampilkontrak("WHERE id_surat='$id_surat'"); 
            foreach($tampil AS $t){
          ?>
          <tr>
            <th>ID</th>
            <td colspan="2"><?php echo ": ".$t['id_surat']; ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>Judul Surat</th>
            <td colspan="2"><?php echo ": ".$t['judul_surat']; ?></td>
          </tr> 
          <tr>
            <th>Tipe Pagu Surat</th>
            <td colspan="2"><?php echo ": ".$t['tipe_pagu']; ?></td>
          </tr> 
          <tr>
            <th>Nama Pejabat Pembuat Komitmen</th>
            <td colspan="2"><?php echo ": ".$t['nama_ppk']; ?></td>
          </tr> 
          <tr>
            <th>NIP Pejabat Pembuat Komitmen</th>
            <td colspan="2"><?php echo ": ".$t['nip_ppk']; ?></td>
          </tr> 
          <tr>
            <th>Nama Pokja Pengadaan Barang/Jasa</th>
            <td colspan="2"><?php echo ": ".$t['nama_ppb']; ?></td>
          </tr> 
          <tr>
            <th>NIP Pokja Pengadaan Barang/Jasa</th>
            <td colspan="2"><?php echo ": ".$t['nip_ppb']; ?></td>
          </tr>
          <tr>
            <th>Nama Panitia</th>
            <th colspan="2">Jabatan Panitia</th>
          </tr>
          <?php
            $i=0;
            $tampil = $surat_kontrak->tampilPanitia("WHERE id_surat='$t[id_surat]'");
            foreach($tampil AS $tp){
          ?>
          <?php
              $nama_panitia[$i]=$tp['nama_panitia'];
              $jabatan_panitia[$i]=$tp['jabatan_panitia'];
              $i++;
            }
          ?>
          <tr>
            <td><?=$nama_panitia[0];?></td>
            <td colspan="2"><?=$jabatan_panitia[0];?></td>
          </tr> 
          <tr>
            <td><?=$nama_panitia[1];?></td>
            <td colspan="2"><?=$jabatan_panitia[1];?></td>
          </tr> 
          <tr>
            <td><?=$nama_panitia[2];?></td>
            <td colspan="2"><?=$jabatan_panitia[2];?></td>
          </tr> 
          <tr>
            <td><?=$nama_panitia[3];?></td>
            <td><?=$jabatan_panitia[3];?></td>
            <td>NIP : <?="\t".$nama_panitia[6];?></td> 
          <tr>
            <td><?=$nama_panitia[4];?></td>
            <td colspan="2"><?=$jabatan_panitia[4];?></td>
          </tr> 
          <tr>
            <td><?=$nama_panitia[5];?></td>
            <td colspan="2"><?=$jabatan_panitia[5];?></td>
          </tr> 
          <tr>
            <th colspan="2">Surat - Surat</th>
            <th>Aksi </th>
          </tr>
          <tr>
            <th><div class="margin">Surat Harga Perkiraan Sendiri / Owner Estimate (OE)</div></th>
            <?php 
              if(empty($t['nomor_oe'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?page=surat_oe&pageParent=surat_kontrak&page=surat_oe&act=insert_surat_oe&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>"; 
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_oe&act=detail_surat_oe&id=$_GET[id]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_oe&act=edit_surat_oe&id=$_GET[id]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Permintaan Penawaran Harga (PPH)</div></th>
            <?php
              if(empty($t['nomor_pph'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_pph&act=insert_surat_pph&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_pph&act=detail_surat_pph&id=$_GET[id]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_pph&act=edit_surat_pph&id=$_GET[id]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Pemasukan/Pembukaan Surat Penawaran Harga (BAP/PSPH)</div></th>
            <?php 
              if(empty($t['nomor_bappsph'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bappsph&act=insert_surat_bappsph&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bappsph&act=detail_surat_bappsph&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bappsph&act=edit_surat_bappsph&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <!-- <tr>
            <th><div class="margin">Surat PPSPH</div></th>
            <?php 
              if(empty($t['waktu_ppsph'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_ppsph&act=insert_surat_ppsph&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_ppsph&act=detail_surat_ppsph&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_ppsph&act=edit_surat_ppsph&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr> -->
          <tr>
            <th><div class="margin">Surat Berita Acara Penelitian Penawaran harga (BAPPH)</div></th>
            <?php 
              if(empty($t['nomor_bapph'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapph&act=insert_surat_bapph&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapph&act=detail_surat_bapph&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapph&act=edit_surat_bapph&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Undangan Klarifikasi dan Negosiasi Harga (UKNH)</div></th>
            <?php 
              if(empty($t['nomor_uknh'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_uknh&act=insert_surat_uknh&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_uknh&act=detail_surat_uknh&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_uknh&act=edit_surat_uknh&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Klarifikasi dan Negosiasi Harga (BAKNH)</div></th>
            <?php 
              if(empty($t['nomor_baknh'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=insert_surat_baknh&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=detail_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=edit_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Lampiran Berita Acara Klarifikasi dan Negosiasi Harga (LBAKNH)</div></th>
            <?php 
              if(empty($t['nomor_baknh'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=insert_surat_baknh&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=detail_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=edit_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Lampiran Hasil Klarifikasi dan Negosiasi Harga (LHKNH)</div></th>
            <?php 
              if(empty($t['nomor_baknh'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=insert_surat_baknh&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=detail_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=edit_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Klarifikasi dan Negosiasi Harga (KNH)</div></th>
            <?php 
              if(empty($t['nomor_baknh'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=insert_surat_baknh&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=detail_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_baknh&act=edit_surat_baknh&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Hasil Pengadaan Langsung (BAHPL)</div></th>
            <?php 
              if(empty($t['nomor_bahpl'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bahpl&act=insert_surat_bahpl&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bahpl&act=detail_surat_bahpl&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bahpl&act=edit_surat_bahpl&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Penetapan Penyedia</div></th>
            <?php 
              if(empty($t['nomor_pp'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_pp&act=insert_surat_pp&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_pp&act=detail_surat_pp&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_pp&act=edit_surat_pp&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Pengumuman Penyedia (BAPP)</div></th>
            <?php 
              if(empty($t['nomor_bapp'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapp&act=insert_surat_bapp&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapp&act=detail_surat_bapp&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapp&act=edit_surat_bapp&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Perintah Kerja (SPK)</div></th>
            <?php 
              if(empty($t['nomor_spk'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_spk&act=insert_surat_spk&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_spk&act=detail_surat_spk&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_spk&act=edit_surat_spk&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Lampiran Surat Perintah Kerja (LSPK)</div></th>
            <?php 
              if(empty($t['nomor_spk'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_spk&act=insert_surat_spk&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_spk&act=detail_surat_spk&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_spk&act=edit_surat_spk&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Pesanan</div></th>
            <?php 
              if(empty($t['nomor_sp'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_sp&act=insert_surat_sp&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_sp&act=detail_surat_sp&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_sp&act=edit_surat_sp&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Pemeriksaan Barang (BAPB)</div></th>
            <?php 
              if(empty($t['nomor_bapb'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapb&act=insert_surat_bapb&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapb&act=detail_surat_bapb&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bapb&act=edit_surat_bapb&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Serah Terima Barang (BASTB)</div></th>
            <?php 
              if(empty($t['nomor_bastb'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bastb&act=insert_surat_bastb&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bastb&act=detail_surat_bastb&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bastb&act=edit_surat_bastb&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
          <tr>
            <th><div class="margin">Surat Berita Acara Pembayaran (BAP)</div></th>
            <?php 
              if(empty($t['nomor_bap'])){
                echo"<td><div class='margin'> : <i class='fa fa-times'></i> Belum Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bap&act=insert_surat_bap&id_surat=$_GET[id]' class='btn btn-sm btn-success btn-flat pull-left margin'>Buat Surat</a>
                </td>";
              }else{
                echo"<td><div  class='margin'> : <i class='fa fa-check'></i> Sudah Ada Surat</div></td>                      
                <td>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bap&act=detail_surat_bap&id=$t[id_surat]' class='btn btn-sm btn-info btn-flat pull-left margin'>Detail Data Surat</a>
                  <a href='index.php?pageParent=surat_kontrak&page=surat_bap&act=edit_surat_bap&id=$t[id_surat]' class='btn btn-sm btn-warning btn-flat pull-left margin'>Ubah Data Surat</a>
                </td>";
              }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="index.php?page=surat_kontrak&act=edit_surat_kontrak&id=<?php echo $t['id_surat'] ?>" class="btn btn-sm btn-warning btn-flat pull-left margin">Ubah Data Surat Kontrak </a>
    <a href="index.php?page=surat_kontrak&act=hapus_surat_kontrak&id=<?php echo $t['id_surat'] ?>" class="btn btn-sm btn-danger btn-flat pull-left margin" onclick="return confirm('apakah anda yakin akan menghapus semua data surat ini ? data yang terhapus meliputi semua data barang, data surat Perusahaan, dan data surat kontrak')"> Hapus Surat</a>
    <?php
      $i=0;
      $tampilpt=$surat_pt->tampilPT("WHERE id_surat=$_GET[id]");
      
      $tampil=$barang->banyakBarang(" INNER JOIN spk ON spk.id_barang=barang.id_barang INNER JOIN pagu ON pagu.id_barang=barang.id_barang INNER JOIN penawaran ON penawaran.id_barang=barang.id_barang WHERE id_surat=$_GET[id] ");
      foreach($tampil AS $bb){
        $banyak_barang = $bb['hitung'];
      }
      
      if($banyak_barang==0){
        echo "<button class='btn btn-sm alert-danger btn-flat pull-right margin' disabled>  Silakan isi dulu barang yang akan dijual, untuk mendownload dokumennya.</button>";
      }elseif(empty($tampilpt)){
        echo "<button class='btn btn-sm alert-danger btn-flat pull-right margin' disabled>  Silakan isi dulu nomor ph pada laman surat perusahaan, untuk mendownload dokumennya.</button>";
      }else{
        foreach($tampilpt AS $pt){
          $nomor_ph=$pt['nomor_ph'];
        }
        $tampil=$barang->tampilBarang(" INNER JOIN spk ON spk.id_barang=barang.id_barang INNER JOIN pagu ON pagu.id_barang=barang.id_barang INNER JOIN penawaran ON penawaran.id_barang=barang.id_barang WHERE id_surat=$_GET[id] ");
        foreach($tampil AS $tb){
          $nama_barang[$i] = $tb['nama_barang'];
          $spesifikasi[$i] = $tb['spesifikasi'];
          $volume[$i] = $tb['volume'];
          $satuan[$i] = $tb['satuan'];
          $harga_dasar_hps[$i] =$tb['harga_dasar'];
          $harga_dasar_penawaran[$i] =$tb['harga_dasar_penawaran'];
          $harga_dasar_spk[$i] =$tb['harga_dasar_spk'];
          $keuntungan_hps[$i] =$tb['keuntungan_pagu'];
          $keuntungan_penawaran[$i] =$tb['keuntungan_penawaran'];
          $keuntungan_spk[$i] =$tb['keuntungan_spk'];
          $jumlah_keuntungan_hps[$i] =$tb['jumlah_keuntungan_pagu'];
          $jumlah_keuntungan_penawaran[$i] =$tb['jumlah_keuntungan_penawaran'];
          $jumlah_keuntungan_spk[$i] =$tb['jumlah_keuntungan_spk'];
          $ppn_hps[$i] =$tb['ppn_pagu'];
          $ppn_penawaran[$i] =$tb['ppn_penawaran'];
          $ppn_spk[$i] =$tb['ppn_spk'];
          $hps_hps[$i] =$tb['hps_pagu'];
          $hps_penawaran[$i] =$tb['hps_penawaran'];
          $hps_spk[$i] =$tb['hps_spk'];
          $total_harga_hps[$i] =$tb['total_harga_pagu'];
          $total_harga_penawaran[$i] =$tb['total_harga_penawaran'];
          $total_harga_spk[$i] =$tb['total_harga_spk'];

          $i++;
        }
        $tampil=$surat_kontrak->tampilKontrak("INNER JOIN (jurusan INNER JOIN (fakultas INNER JOIN universitas ON fakultas.id_universitas=universitas.id_universitas) ON jurusan.id_fakultas=fakultas.id_fakultas) ON surat_kontrak.id_jurusan=jurusan.id_jurusan INNER JOIN akun_user ON surat_kontrak.id_user=akun_user.id_user WHERE id_surat=$_GET[id]"); 
        foreach($tampil AS $t){
    ?>
      <form class="pull-right" method="POST" action="modul/surat/download_surat.php">
        <!-- data surat umum -->
        <input type="hidden" name="judul" value="<?php echo $t['judul_surat'] ?>">
        <input type="hidden" name="nama_jurusan" value="<?php echo $t['nama_jurusan'] ?>">
        <input type="hidden" name="nama_fakultas" value="<?php echo $t['nama_fakultas'] ?>">
        <input type="hidden" name="nama_universitas" value="<?php echo $t['nama_universitas'] ?>">
        <input type="hidden" name="alamat_universitas" value="<?php echo $t['alamat_universitas'] ?>">
        <input type="hidden" name="nama_ppk" value="<?php echo $t['nama_ppk'] ?>">
        <input type="hidden" name="nip_ppk" value="<?php echo $t['nip_ppk'] ?>">
        <input type="hidden" name="nama_ppb" value="<?php echo $t['nama_ppb'] ?>">
        <input type="hidden" name="nip_ppb" value="<?php echo $t['nip_ppb'] ?>">
        <input type="hidden" name="tahun" value="<?php echo $t['tahun_surat'] ?>">
        <input type="hidden" name="tipe_pagu" value="<?php echo $t['tipe_pagu'] ?>">
        <input type="hidden" name="nama_perusahaan" value="<?php echo $t['nama_perusahaan'] ?>">
        <input type="hidden" name="alamat_perusahaan" value="<?php echo $t['alamat_perusahaan'] ?>">
        <input type="hidden" name="direktur_perusahaan" value="<?php echo $t['nama_user'] ?>">
        <input type="hidden" name="npwp_perusahaan" value="<?php echo $t['npwp'] ?>">
        <!-- data persurat -->
        <input type="hidden" name="nomor_ph" value="<?php echo $nomor_ph ?>">
        <input type="hidden" name="nomor_oe" value="<?php echo $t['nomor_oe'] ?>">
        <input type="hidden" name="tanggal_oe" value="<?php echo $t['tanggal_oe'] ?>">
        <input type="hidden" name="nomor_pph" value="<?php echo $t['nomor_pph'] ?>">
        <input type="hidden" name="tanggal_pph" value="<?php echo $t['tanggal_pph'] ?>">
        <input type="hidden" name="tanggal_penawaran_pph" value="<?php echo $t['tanggal_penawaran_pph'] ?>">
        <input type="hidden" name="nomor_bappsph" value="<?php echo $t['nomor_bappsph'] ?>">
        <input type="hidden" name="tanggal_bappsph" value="<?php echo $t['tanggal_bappsph'] ?>">
        <input type="hidden" name="waktu_pengerjaan_bappsph" value="<?php echo $t['waktu_pengerjaan_bappsph'] ?>">
        <input type="hidden" name="waktu_ppsph" value="<?php echo $t['waktu_ppsph'] ?>">
        <input type="hidden" name="nomor_bapph" value="<?php echo $t['nomor_bapph'] ?>">
        <input type="hidden" name="tanggal_bapph" value="<?php echo $t['tanggal_bapph'] ?>">
        <input type="hidden" name="hari_bapph" value="<?php echo $t['hari_bapph'] ?>">
        <input type="hidden" name="nomor_uknh" value="<?php echo $t['nomor_uknh'] ?>">
        <input type="hidden" name="tanggal_uknh" value="<?php echo $t['tanggal_uknh'] ?>">
        <input type="hidden" name="waktu_uknh" value="<?php echo $t['waktu_uknh'] ?>">
        <input type="hidden" name="nomor_baknh" value="<?php echo $t['nomor_baknh'] ?>">
        <input type="hidden" name="tanggal_baknh" value="<?php echo $t['tanggal_baknh'] ?>">
        <input type="hidden" name="nomor_bahpl" value="<?php echo $t['nomor_bahpl'] ?>">
        <input type="hidden" name="tanggal_bahpl" value="<?php echo $t['tanggal_bahpl'] ?>">
        <input type="hidden" name="nomor_pp" value="<?php echo $t['nomor_pp'] ?>">
        <input type="hidden" name="tanggal_pp" value="<?php echo $t['tanggal_pp'] ?>">
        <input type="hidden" name="tanggal_spk_pp" value="<?php echo $t['tanggal_spk_pp'] ?>">
        <input type="hidden" name="waktu_pp" value="<?php echo $t['waktu_pp'] ?>">
        <input type="hidden" name="nomor_bapp" value="<?php echo $t['nomor_bapp'] ?>">
        <input type="hidden" name="nomor_spk" value="<?php echo $t['nomor_spk'] ?>">
        <input type="hidden" name="tanggal_spk" value="<?php echo $t['tanggal_spk'] ?>">
        <input type="hidden" name="nomor_sp" value="<?php echo $t['nomor_sp'] ?>">
        <input type="hidden" name="nomor_bapb" value="<?php echo $t['nomor_bapb'] ?>">
        <input type="hidden" name="nomor_bastb" value="<?php echo $t['nomor_bastb'] ?>">
        <input type="hidden" name="nomor_bap" value="<?php echo $t['nomor_bap'] ?>">
        <input type="hidden" name="banyak_barang" value="<?php echo $banyak_barang ?>">
        <!-- harga Barang HPS - PENAWARAN - SPK -->
        <?php
          for($i=0;$i<$banyak_barang;$i++){
            echo "<input type='hidden' name='nama_barang"."$i' value='$nama_barang[$i]'>";
            echo "<input type='hidden' name='spesifikasi"."$i' value='$spesifikasi[$i]'>";
            echo "<input type='hidden' name='volume"."$i' value='$volume[$i]'>";
            echo "<input type='hidden' name='satuan"."$i' value='$satuan[$i]'>";
            echo "<input type='hidden' name='harga_dasar_hps"."$i' value='$harga_dasar_hps[$i]'>";
            echo "<input type='hidden' name='harga_dasar_penawaran"."$i' value='$harga_dasar_penawaran[$i]'>";
            echo "<input type='hidden' name='harga_dasar_spk"."$i' value='$harga_dasar_spk[$i]'>";
            echo "<input type='hidden' name='keuntungan_hps"."$i' value='$keuntungan_hps[$i]'>";
            echo "<input type='hidden' name='keuntungan_penawaran"."$i' value='$keuntungan_penawaran[$i]'>";
            echo "<input type='hidden' name='keuntungan_spk"."$i' value='$keuntungan_spk[$i]'>";
            echo "<input type='hidden' name='jumlah_keuntungan_hps"."$i' value='$jumlah_keuntungan_hps[$i]'>";
            echo "<input type='hidden' name='jumlah_keuntungan_penawaran"."$i' value='$jumlah_keuntungan_penawaran[$i]'>";
            echo "<input type='hidden' name='jumlah_keuntungan_spk"."$i' value='$jumlah_keuntungan_spk[$i]'>";
            echo "<input type='hidden' name='ppn_hps"."$i' value='$ppn_hps[$i]'>";
            echo "<input type='hidden' name='ppn_penawaran"."$i' value='$ppn_penawaran[$i]'>";
            echo "<input type='hidden' name='ppn_spk"."$i' value='$ppn_spk[$i]'>";
            echo "<input type='hidden' name='hps_hps"."$i' value='$hps_hps[$i]'>";
            echo "<input type='hidden' name='hps_penawaran"."$i' value='$hps_penawaran[$i]'>";
            echo "<input type='hidden' name='hps_spk"."$i' value='$hps_spk[$i]'>";
            echo "<input type='hidden' name='total_harga_hps"."$i' value='$total_harga_hps[$i]'>";
            echo "<input type='hidden' name='total_harga_penawaran"."$i' value='$total_harga_penawaran[$i]'>";
            echo "<input type='hidden' name='total_harga_spk"."$i' value='$total_harga_spk[$i]'>";
          }
          for($i=0;$i<7;$i++){
            echo "<input type='hidden' name='nama_panitia"."$i' value='$nama_panitia[$i]'>";
          }
          for($i=0;$i<7;$i++){
            echo "<input type='hidden' name='jabatan_panitia"."$i' value='$jabatan_panitia[$i]'>";
          }
        ?>
        <input type="hidden" name="tipe_download" value="kontrak">
        <button name="oke" class="btn btn-sm btn-success btn-flat pull-left margin"> Download Surat Kontrak</button>
      </form>
    <?php
        }   
      }
    ?>
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
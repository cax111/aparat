<!-- TABLE: LATEST ORDERS -->
          <div class="box box-success" id="form" style="display:none">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> Data Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <?php
                        $tampil=$user->tampilUser("WHERE id_user='$_SESSION[id_user_aparat]'"); 
                        foreach($tampil AS $t){
                    ?>
                  <tr>
                    <th>ID_Pengguna</th>
                    <td colspan="2"><?php echo ": ".$t['id_user']; ?></td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Username</th>
                    <td><?php echo ": ".$t['username']; ?></td>
                  </tr> 
                  <tr>
                    <th>Nama Perusahaan</th>
                    <td><?php echo ": ".$t['nama_perusahaan']; ?></td>
                  </tr> 
                  <tr>
                    <th>Nama Pemilik</th>
                    <td><?php echo ": ".$t['nama_user']; ?></td>
                  </tr> 
                  <tr>
                    <th>Alamat Perusahaan</th>
                    <td><?php echo ": ".$t['alamat_perusahaan']; ?></td>
                  </tr> 
                  <tr>
                    <th>Alamat Perusahaan</th>
                    <td><?php echo ": ".$t['npwp']; ?></td>
                  </tr> 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="index.php?page_pengguna=profil-pengguna&act=edit_data-pengguna&id=<?php echo $t['id_user'] ?>" class="btn btn-sm btn-warning btn-flat pull-right margin">Ubah Data</a>
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
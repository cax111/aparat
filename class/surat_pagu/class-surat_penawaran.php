<?php
	class penawaran extends database{


      function tampilpenawaran($order,$id_surat){
        $tampil=parent::koneksi()->prepare("SELECT * FROM pagu ".$order." WHERE id_surat=".$id_surat);
          $tampil->execute();
          while ($t=$tampil->fetch()) {
            $data[]=$t;
          }
          if(!empty($data)){
            return $data;
          }else{
            return null;
          }
      }

			function tampilhargapenawaran($id_suratnya){
				$tampil=parent::koneksi()->prepare("SELECT * FROM penawaran  WHERE id_barang=".$id_suratnya);
					$tampil->execute();
					if(!empty($tampil)){
						return $tampil;
					}
			}



          function tampilpenawaranbarang($order,$id_barang){
            $tampil=parent::koneksi()->prepare("SELECT * FROM pagu ".$order." WHERE nama_barang='$id_barang'");
              $tampil->execute();
              while ($t=$tampil->fetch()) {
                $data[]=$t;
              }
              if(!empty($data)){
                return $data;
              }else{
                return null;
              }
          }

					function tampilpenawaranbarang1($order,$id_barang){
						$tampil=parent::koneksi()->prepare("SELECT * FROM penawaran ".$order." WHERE id_surat='$id_barang'");
							$tampil->execute();
							while ($t=$tampil->fetch()) {
								$data[]=$t;
							}
							if(!empty($data)){
								return $data;
							}else{
								return null;
							}
					}


					function insert_harga_penawaran($harga_dasar,$id_barang,$keuntungan,$jumlah,$ppn,$hps,$total){
						$insert=parent::koneksi()->prepare("INSERT INTO penawaran(harga_dasar_penawaran,id_barang,keuntungan_penawaran,jumlah_keuntungan_penawaran, ppn_penawaran, hps_penawaran, total_harga_penawaran) VALUES (?,?,?,?,?,?,?)");
						$insert->BindParam(1,$harga_dasar);
						$insert->BindParam(2,$id_barang);
						$insert->BindParam(3,$keuntungan);
						$insert->BindParam(4,$jumlah);
						$insert->BindParam(5,$ppn);
						$insert->BindParam(6,$hps);
						$insert->BindParam(7,$total);
						$insert->execute();
					}

					function update_harga_penawaran($harga_dasar,$id_barang,$keuntungan,$jumlah,$ppn,$hps,$total){
						$insert=parent::koneksi()->prepare("UPDATE penawaran SET harga_dasar_penawaran=? ,keuntungan_penawaran=?,jumlah_keuntungan_penawaran=?, ppn_penawaran=?, hps_penawaran=?, total_harga_penawaran=? WHERE id_barang='$id_barang'");
						$insert->BindParam(1,$harga_dasar);
						$insert->BindParam(2,$keuntungan);
						$insert->BindParam(3,$jumlah);
						$insert->BindParam(4,$ppn);
						$insert->BindParam(5,$hps);
						$insert->BindParam(6,$total);
						$insert->execute();
					}
    	}

?>

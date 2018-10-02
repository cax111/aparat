<?php
	class spk extends database{

        	function tampilsuratpenawaran($id){
						$tampil2=parent::koneksi()->prepare("SELECT * FROM penawaran WHERE id_barang=".$id);
		          $tampil2->execute();
		          return $tampil2;

					}

					function tampildatasuratspk($id){
						$tampil2=parent::koneksi()->prepare("SELECT * FROM spk WHERE id_barang=".$id);
		          $tampil2->execute();
		          return $tampil2;

					}


					function tampilspkbarang($order,$id_barang){
            $tampil=parent::koneksi()->prepare("SELECT * FROM spk ".$order." WHERE nama_barang='$id_barang'");
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

					function tampilhargaspk($id_suratnya){
						$tampil=parent::koneksi()->prepare("SELECT * FROM spk  WHERE id_barang=".$id_suratnya);
							$tampil->execute();
							if(!empty($tampil)){
								return $tampil;
							}
					}

					function tampil_spkbarang($order,$id_barang){
            $tampil=parent::koneksi()->prepare("SELECT * FROM penawaran ".$order." WHERE nama_barang='$id_barang'");
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
						$tampil=parent::koneksi()->prepare("SELECT * FROM spk  WHERE id_barang=".$id_suratnya);
							$tampil->execute();
							if(!empty($tampil)){
								return $tampil;
							}
					}

			function insert_harga_penawaran($harga_dasar,$id_barang,$keuntungan,$jumlah,$ppn,$hps,$total){
								$insert=parent::koneksi()->prepare("INSERT INTO spk(harga_dasar_spk,id_barang,keuntungan_spk,jumlah_keuntungan_spk, ppn_spk, hps_spk, total_harga_spk) VALUES (?,?,?,?,?,?,?)");
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
								$insert=parent::koneksi()->prepare("UPDATE spk SET harga_dasar_spk=? ,keuntungan_spk=?,jumlah_keuntungan_spk=?, ppn_spk=?, hps_spk=?, total_harga_spk=? WHERE id_barang='$id_barang'");
								$insert->BindParam(1,$harga_dasar);
								$insert->BindParam(2,$keuntungan);
								$insert->BindParam(3,$jumlah);
								$insert->BindParam(4,$ppn);
								$insert->BindParam(5,$hps);
								$insert->BindParam(6,$total);
								$insert->execute();
							}

							function tampilspkbarang1($order,$id_barang){
								$tampil=parent::koneksi()->prepare("SELECT * FROM spk ".$order." WHERE id_surat='$id_barang'");
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

    	}

?>

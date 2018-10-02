<?php
	class hps extends database{

		function tampilhps(){
			$tampil=parent::koneksi()->prepare("select * from barang where id_barang IN(Select MAX(id_barang)FROM barang) ");
			$tampil->execute();
			if(!empty($tampil)){
				return $tampil;
			}

		}

		function inserthps($nama_barang,$spesifikasi,$volume,$satuan,$id_surat){
			$insert=parent::koneksi()->prepare("INSERT INTO barang (nama_barang,spesifikasi,volume,satuan,id_surat) VALUES(?,?,?,?,?)");
			$insert->BindParam(1,$nama_barang);
			$insert->BindParam(2,$spesifikasi);
			$insert->BindParam(3,$volume);
			$insert->BindParam(4,$satuan);
			$insert->BindParam(5,$id_surat);

			$insert->execute();


			}


			function insert_harga_hps($id_barang,$harga_dasar,$keuntungan,$jumlah,$ppn,$hps,$total){
				$insert=parent::koneksi()->prepare("INSERT INTO pagu(id_barang,harga_dasar, keuntungan_pagu, jumlah_keuntungan_pagu, ppn_pagu, hps_pagu, total_harga_pagu) VALUES (?,?,?,?,?,?,?)");
				$insert->BindParam(1,$id_barang);
				$insert->BindParam(2,$harga_dasar);
				$insert->BindParam(3,$keuntungan);
				$insert->BindParam(4,$jumlah);
				$insert->BindParam(5,$ppn);
				$insert->BindParam(6,$hps);
				$insert->BindParam(7,$total);
				$insert->execute();
			}

			function tampilbarang($order,$id_surat){
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


			function delete_penawaran($id_barang){
				$delete=parent::koneksi()->prepare("DELETE FROM penawaran WHERE  id_barang=?");
				$delete->BindParam(1,$id_barang);

				$delete->execute();
			}

			function delete_hps($id_barang){
				$delete=parent::koneksi()->prepare("DELETE FROM pagu WHERE  id_barang=?");
				$delete->BindParam(1,$id_barang);

				$delete->execute();
			}

			function delete_spk($id_barang){
				$delete=parent::koneksi()->prepare("DELETE FROM spk WHERE  id_barang=?");
				$delete->BindParam(1,$id_barang);

				$delete->execute();
			}

			function delete_barang($id_barang){
				$delete=parent::koneksi()->prepare("DELETE FROM barang WHERE  id_barang=?");
				$delete->BindParam(1,$id_barang);

				$delete->execute();
			}


		}

?>

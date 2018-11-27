<?php
	class kelolaSuratKontrak extends database{
		function tampilUniversitas(){
			$tampil=parent::koneksi()->prepare("SELECT * FROM universitas ORDER BY id_universitas ASC");
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

		function tampilFakultas(){
			$tampil=parent::koneksi()->prepare("SELECT * FROM fakultas ORDER BY id_fakultas ASC");
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

		function tampilJurusan($fak_id){
			$tampil=parent::koneksi()->prepare("SELECT * FROM jurusan where id_fakultas = '$fak_id'");
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

		function tampilJurusan2(){
			$tampil=parent::koneksi()->prepare("SELECT * FROM jurusan");
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

		function tampilKontrak($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM surat_kontrak ".$order);
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


		function tampilPanitia($order){
			$tampil=parent::koneksi()->prepare("SELECT * FROM panitia_pengawas ".$order);
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

		function insertKontrak($judul,$id_jurusan,$id_user,$tahun_surat,$tipe_pagu,$nama_ppk,$nip_ppk,$nama_ppb,$nip_ppb,$kpph,$spph,$apph,$pphp1,$npphp1,$pphp2,$pphp3){
			$insert=parent::koneksi()->prepare("INSERT INTO surat_kontrak (judul_surat,id_jurusan,id_user,tahun_surat,tipe_pagu,nama_ppk,nip_ppk,nama_ppb,nip_ppb) VALUES(?,?,?,?,?,?,?,?,?)");
			$insert->BindParam(1,$judul);
			$insert->BindParam(2,$id_jurusan);
			$insert->BindParam(3,$id_user);
			$insert->BindParam(4,$tahun_surat);
			$insert->BindParam(5,$tipe_pagu);
			$insert->BindParam(6,$nama_ppk);
			$insert->BindParam(7,$nip_ppk);
			$insert->BindParam(8,$nama_ppb);
			$insert->BindParam(9,$nip_ppb);
			$insert->execute();

			if($insert->rowCount()==0){
			   return "Input Data Gagal.";
			}else{
				$tampil=parent::koneksi()->prepare("SELECT id_surat FROM surat_kontrak ORDER BY id_surat DESC LIMIT 1");
				$tampil->execute();
				$id_surat=0;
				echo"insert surat kontrak rebesss";
				while ($t=$tampil->fetch()) {
					$id_surat=$t['id_surat'];
				}
				$ketua = "Ketua";
				$sekretaris = "Sekretaris";
				$anggota = "Anggota";
				$jpphk1 = "Panitia Penerima Hasil Kerja 1";
				$jpphk2 = "Panitia Penerima Hasil Kerja 2";
				$jpphk3 = "Panitia Penerima Hasil Kerja 3";
				$jnpphk1 = "NIP Panitia Penerima Hasil Kerja 1";
				$insert=parent::koneksi()->prepare("INSERT INTO panitia_pengawas (id_surat,nama_panitia,jabatan_panitia) VALUES(?,?,?),(?,?,?),(?,?,?),(?,?,?),(?,?,?),(?,?,?),(?,?,?)");
			    $insert->BindParam(1,$id_surat);
			    $insert->BindParam(2,$kpph);
			    $insert->BindParam(3,$ketua);
			    $insert->BindParam(4,$id_surat);
			    $insert->BindParam(5,$spph);
			    $insert->BindParam(6,$sekretaris);
			    $insert->BindParam(7,$id_surat);
			    $insert->BindParam(8,$apph);
			    $insert->BindParam(9,$anggota);
			    $insert->BindParam(10,$id_surat);
			    $insert->BindParam(11,$pphp1);
			    $insert->BindParam(12,$jpphk1);
			    $insert->BindParam(13,$id_surat);
			    $insert->BindParam(14,$pphp2);
			    $insert->BindParam(15,$jpphk2);
			    $insert->BindParam(16,$id_surat);
			    $insert->BindParam(17,$pphp3);
			    $insert->BindParam(18,$jpphk3);
			    $insert->BindParam(19,$id_surat);
			    $insert->BindParam(20,$npphp1);
			    $insert->BindParam(21,$jnpphk1);
			    $insert->execute();
			    
				echo $insert->errorInfo();
				if($insert->rowCount()==0){
					echo"gagal";
					return "Input Data Gagal.";
				}else{
					echo"berhasil";
				    return "Input Data Berhasil.";
				}
			}
		}

		function ubahKontrak($judul,$id_jurusan,$id_user,$tahun_surat,$tipe_pagu,$nama_ppk,$nip_ppk,$nama_ppb,$nip_ppb,$kpph,$spph,$apph,$pphp1,$npphp1,$pphp2,$pphp3,$id,$id_panitia){
			$update1=parent::koneksi()->prepare("UPDATE surat_kontrak SET judul_surat=?, id_jurusan=?, id_user=?, tahun_surat=?, tipe_pagu=?, nama_ppk=?, nip_ppk=?, nama_ppb=?, nip_ppb=? WHERE id_surat=?");
			$update1->BindParam(1,$judul);
			$update1->BindParam(2,$id_jurusan);
			$update1->BindParam(3,$id_user);
			$update1->BindParam(4,$tahun_surat);
			$update1->BindParam(5,$tipe_pagu);
			$update1->BindParam(6,$nama_ppk);
			$update1->BindParam(7,$nip_ppk);
			$update1->BindParam(8,$nama_ppb);
			$update1->BindParam(9,$nip_ppb);
			$update1->BindParam(10,$id);
			$update1->execute();

			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$kpph);
			$update2->BindParam(2,$id_panitia[0]);
			$update2->execute();

			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$spph);
			$update2->BindParam(2,$id_panitia[1]);
			$update2->execute();   

			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$apph);
			$update2->BindParam(2,$id_panitia[2]);
			$update2->execute();

			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$pphp1);
			$update2->BindParam(2,$id_panitia[3]);
			$update2->execute();   

			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$pphp2);
			$update2->BindParam(2,$id_panitia[4]);
			$update2->execute();

			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$pphp3);
			$update2->BindParam(2,$id_panitia[5]);
			$update2->execute();
			$update2=parent::koneksi()->prepare("UPDATE panitia_pengawas SET nama_panitia=? WHERE id_panitia=?");
			$update2->BindParam(1,$npphp1);
			$update2->BindParam(2,$id_panitia[6]);
			$update2->execute();

			if($update1->rowCount()==0&&$update2->rowCount()==0){
				return "Ubah Data Gagal.";
			}else{
				return "Ubah Data Berhasil.";
			}
		}
		function hapusData($id_surat){
			$cekBarang=parent::koneksi()->prepare("SELECT * FROM barang INNER JOIN surat_kontrak ON barang.id_surat=surat_kontrak.id_surat WHERE barang.id_surat=?");
			$cekBarang->BindParam(1,$id_surat);
			$cekBarang->execute();
			while($cek=$cekBarang->fetch()){
				$data[]=$cek;
			}
			if(!empty($data)){
				foreach($data AS $tampil){
					echo "Barang ADA<br/>";
					echo $id_barang = $tampil['id_barang']."<br/>";
					$cekPAGU=parent::koneksi()->prepare("SELECT * FROM pagu INNER JOIN barang ON barang.id_barang=pagu.id_barang WHERE barang.id_barang='$id_barang'");
					$cekPAGU->execute();
					while($cek=$cekPAGU->fetch()){
						$dataPAGU[]=$cek;
					}
					if(!empty($dataPAGU)){
						echo "PAGU ADA<br/>";
						$cekPenawaran=parent::koneksi()->prepare("SELECT * FROM penawaran INNER JOIN barang ON barang.id_barang=penawaran.id_barang WHERE barang.id_barang='$id_barang'");
						$cekPenawaran->execute();
						while($cek=$cekPenawaran->fetch()){
							$dataPenawaran[]=$cek;
						}
						if(!empty($dataPenawaran)){
							echo "Penawaran ADA<br/>";
							$cekSPK=parent::koneksi()->prepare("SELECT * FROM spk INNER JOIN barang ON barang.id_barang=spk.id_barang WHERE barang.id_barang='$id_barang'");
							$cekSPK->execute();
							while($cek=$cekSPK->fetch()){
								$dataSPK[]=$cek;
							}
							if(!empty($dataSPK)){
								echo "SPK ADA<br/>";
								$deleteSPK=parent::koneksi()->prepare("DELETE FROM spk WHERE id_barang='$id_barang'");
								$deleteSPK->execute();
								$deletePenawaran=parent::koneksi()->prepare("DELETE FROM penawaran WHERE id_barang='$id_barang'");
								$deletePenawaran->execute();
								$deletePAGU=parent::koneksi()->prepare("DELETE FROM pagu WHERE id_barang='$id_barang'");
								$deletePAGU->execute();
								$deleteBarang=parent::koneksi()->prepare("DELETE FROM barang WHERE id_surat='$id_surat'");
								$deleteBarang->execute();
							}else{
								$deletePenawaran=parent::koneksi()->prepare("DELETE FROM penawaran WHERE id_barang='$id_barang'");
								$deletePenawaran->execute();
								$deletePAGU=parent::koneksi()->prepare("DELETE FROM pagu WHERE id_barang='$id_barang'");
								$deletePAGU->execute();
								$deleteBarang=parent::koneksi()->prepare("DELETE FROM barang WHERE id_surat='$id_surat'");
								$deleteBarang->execute();
							}
						}else{
							$deletePAGU=parent::koneksi()->prepare("DELETE FROM pagu WHERE id_barang='$id_barang'");
							$deletePAGU->execute();
							$deleteBarang=parent::koneksi()->prepare("DELETE FROM barang WHERE id_surat='$id_surat'");
							$deleteBarang->execute();
						}
					}else{
						$deleteBarang=parent::koneksi()->prepare("DELETE FROM barang WHERE id_surat='$id_surat'");
						$deleteBarang->execute();
					}
				}

			}			
			$cekSuratPT=parent::koneksi()->prepare("SELECT * FROM surat_pt INNER JOIN surat_kontrak ON surat_pt.id_surat=surat_kontrak.id_surat WHERE surat_pt.id_surat=?");
			$cekSuratPT->BindParam(1,$id_surat);
			$cekSuratPT->execute();
			while($cek=$cekSuratPT->fetch()){
				$dataSuratPT[]=$cek;
			}
			if(!empty($dataSuratPT)){
				echo "surat PT ADA<br/>";
				$deleteSuratPT=parent::koneksi()->prepare("DELETE FROM surat_pt WHERE id_surat='$id_surat'");
				$deleteSuratPT->execute();
			}		

			$cekPanitia=parent::koneksi()->prepare("SELECT * FROM panitia_pengawas INNER JOIN surat_kontrak ON panitia_pengawas.id_surat=surat_kontrak.id_surat WHERE panitia_pengawas.id_surat=?");
			$cekPanitia->BindParam(1,$id_surat);
			$cekPanitia->execute();
			while($cek=$cekPanitia->fetch()){
				$dataPanitia[]=$cek;
			}
			if(!empty($dataPanitia)){
				echo "Data Panitia ADA<br/>";
				$deletePanitia=parent::koneksi()->prepare("DELETE FROM panitia_pengawas WHERE id_surat='$id_surat'");
				$deletePanitia->execute();
			}

			echo"delete semua data kontrak siapp boss !!!";
			$deleteSurat=parent::koneksi()->prepare("DELETE FROM surat_kontrak WHERE id_surat='$id_surat'");
			$deleteSurat->execute();
			return header('location:http://localhost/aparatt/aparat/index.php?page=surat_kontrak');
		}
	}
?>
<?php
#koneksi
$conn = mysqli_connect("localhost", "root", "", "demo");
#akhir-koneksi

#ambil data propinsi
$query = "SELECT kode, nama FROM propinsi ORDER BY nama";
$sql = mysqli_query($conn, $query);
$arrpropinsi = array();
while ($row = mysqli_fetch_assoc($sql)) {
	$arrpropinsi [ $row['kode'] ] = $row['nama'];
}

?>
<html>
	<head>
		<title>Manipulasi Combobox dengan Ajax-JQuery</title>
		<style type="text/css">
		span.inputan { display:block; margin-bottom:5px; }
		span.inputan label { float:left; display:block; width:200px;}
		</style>
	</head>
	<body>
		<h1>Contoh Manipulasi Combobox dengan Ajax-JQuery</h1>
		<form action="" method="post">
		<span class="inputan">
		<label for="propinsi">Propinsi</label>
		: <select id="propinsi" name="propinsi">
			<option value="">-Pilih-</option>
			<?php
			foreach ($arrpropinsi as $kode=>$nama) {
				echo "<option value='$kode'>$nama</option>";
			}
			?>
		</select>
		</span>
		<span class="inputan">
		<label for="kabupaten">Kabupaten</label>
		: <select id="kabupaten" name="kabupaten">
		</select>
		</span>
		</form>
	</body>
</html>

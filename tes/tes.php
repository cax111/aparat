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

#action get Kabupaten
if(isset($_GET['action']) && $_GET['action'] == "getKab") {
	$kode_prop = $_GET['kode_prop'];
	
	//ambil data kabupaten
	$query = "SELECT kode, nama FROM kabupaten WHERE kode_prop='$kode_prop' ORDER BY nama";
	$sql = mysqli_query($conn, $query);
	$arrkab = array();
	while ($row = mysqli_fetch_assoc($sql)) {
		array_push($arrkab, $row);
	}
	echo json_encode($arrkab);
	exit;
}
?>
<html>
	<head>
		<title>Manipulasi Combobox dengan Ajax-JQuery</title>
		<style type="text/css">
		</style>
		<script type="text/javascript" src="libs/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#propinsi').change(function(){
					$.getJSON('index.php',{action:'getKab', kode_prop:$(this).val()}, function(json){
						$('#kabupaten').html('');
						$.each(json, function(index, row) {
							$('#kabupaten').append('<option value='+row.kode+'>'+row.nama+'</option>');
						});
					});
				});
			});
		</script>
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

<?php
include "../koneksidb.php";
if(isset($_POST["dari"])){ $dari = $_POST["dari"]; }else{ die('{"status":404,"msg":"tidak ada judul"}'); }
if(isset($_POST["ke"])){ $ke = $_POST["ke"]; }else{ die('{"status":404,"msg":"jenis berita tidak dipilih"}'); }
if(isset($_POST["isi"])){ $isi = $_POST["isi"]; }else{ die('{"status":404,"msg":"konten tulisan kosong"}'); }
$today = date('Y-m-d H:i:s', time());
$query = "insert into messages(dari,ke,tanggal,isi) values ('$dari','$ke','$today','$isi')";
$result = mysql_query($query,$koneksi);
if($result){
	?>
	<html>
	<head><script>
		alert("Pesan berhasil dikirim!");
		window.location.href="../timeline.php";
	</script>
	</head><body></body></html>
	<?php
}else{
	echo '{"status":403}';
}
?>

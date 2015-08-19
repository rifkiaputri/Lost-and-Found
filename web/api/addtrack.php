<?php
include "../koneksidb.php";
if(isset($_POST["postid"])){ $post_id = $_POST["postid"]; }else{ die('{"status":404,"msg":"Post ID is undefined"}'); }
if(isset($_POST["username"])){ $username = $_POST["username"]; }else{ die('{"status":404,"msg":"Username is undefined"}'); }
if(isset($_POST["lat"])){ $lat = $_POST["lat"]; }else{ die('{"status":404,"msg":"Latitude is undefined"}'); }
if(isset($_POST["lng"])){ $lng = $_POST["lng"]; }else{ die('{"status":404,"msg":"Longitude is undefined"}'); }
if(isset($_POST["lokasi"])){ $lokasi = $_POST["lokasi"]; }else{ die('{"status":404,"msg":"Lokasi is undefined"}'); }
if(isset($_POST["waktu"])){ $waktu = $_POST["waktu"]; }else{ die('{"status":404,"msg":"Datetime is undefined"}'); }
if(isset($_POST["teks"])){ $teks = $_POST["teks"]; }
$query = "insert into tracker(post_id,username,waktu,lokasi,lat,lng,teks) values ('$post_id','$username','$waktu','$lokasi','$lat','$lng','$teks')";
$result = mysql_query($query,$koneksi);
if($result){
	?>
	<html>
	<head><script>
		alert("Jejak berhasil disimpan!");
		window.location.href="../tracking.php?id=<?php echo $post_id; ?>";
	</script>
	</head><body></body></html>
	<?php
}else{
	echo '{"status":403}';
}
?>
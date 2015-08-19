<?php

namespace app\controllers;

use Yii;
use app\models\Post;

if(isset($_POST["judul"])){ $judul = $_POST["judul"]; }else{ die('{"status":404,"msg":"tidak ada judul"}'); }
if(isset($_POST["type"])){ $type = $_POST["type"]; }else{ die('{"status":404,"msg":"jenis berita tidak dipilih"}'); }
if(isset($_POST["konten"])){ $konten = $_POST["konten"]; }else{ die('{"status":404,"msg":"konten tulisan kosong"}'); }
if(isset($_FILES['foto']) && $_FILES['foto']['name']!=""){
    $file_name = $_FILES['foto']['name'];
    $file_tmp =$_FILES['foto']['tmp_name'];
	if(!move_uploaded_file($_FILES["foto"]["tmp_name"],"../web/images/". $_FILES["foto"]["name"])){
		die('{"status":404,"msg":"gagal upload foto '.$file_name.'"}');
	}
}else{
	$file_name = "";
}
$today = date('Y-m-d H:i:s', time());

// insert a new row of data
$post = new Post();
$post->tipe = $type;
$post->judul = $judul;
$post->username = $username;
$post->tanggal = $today;
$post->konten = $konten;
$post->foto_konten = 'images/' + $file_name;
$post->save();

/*$data = array();
$query = "insert into post(tipe,judul,username,tanggal,konten,foto_konten) values ('$type','$judul','$username','$today','$konten','$file_name')";
$result = mysql_query($query,$koneksi);
if($result){
	?>
	<html>
	<head><script>
		alert("Tulisan berhasil dikirim!");
		window.location.href="../timeline.php";
	</script>
	</head><body></body></html>
	<?php
}else{
	echo '{"status":403}';
}*/
?>
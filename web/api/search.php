<?php
session_start();
include "../koneksidb.php";
if(isset($_SESSION["laf_username"])){ $username = $_SESSION["laf_username"]; }else{ die('{"status":404,"msg":"user not logged in"}'); }
if(isset($_GET["query"])){ $querytext = $_GET["query"]; }
$data = array();
$query = "SELECT * FROM post WHERE (judul LIKE '%$querytext%') OR (username LIKE '%$querytext%') OR (konten LIKE '%$querytext%')";
$result = mysql_query($query,$koneksi);
if($result){
	while($row = mysql_fetch_array($result)){
		array_push($data,array("id"=>$row["id"],"judul"=>$row["judul"],"tipe"=>$row["tipe"],"username"=>$row["username"],"tanggal"=>$row["tanggal"],"konten"=>$row["konten"],"foto_konten"=>$row["foto_konten"]));
	}
	//output dalam format JSON
	echo json_encode($data);
}else{
	die('{"status":404}');
}
?>
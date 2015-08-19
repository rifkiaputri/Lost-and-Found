<?php
session_start();
include "../koneksidb.php";
if(isset($_SESSION["laf_username"])){ $username = $_SESSION["laf_username"]; }else{ die('{"status":404,"msg":"user not logged in"}'); }
$data = array();
$query = "select * from user where username='$username'";
$result = mysql_query($query,$koneksi);
if($result){
	while($row = mysql_fetch_array($result)){
		array_push($data,array("username"=>$row["username"],"password"=>$row["password"],"email"=>$row["email"],"nama"=>$row["nama"],"tanggal_lahir"=>$row["tanggal_lahir"],"alamat"=>$row["alamat"],"foto"=>$row["foto"]));
	}
	echo json_encode($data);
}else{
	die('{"status":404}');
}
?>
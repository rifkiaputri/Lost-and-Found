<?php

if(isset($_GET["post_type"])){ $type = $_GET["post_type"]; }else{ $type = 0; }
if(isset($_GET["post_top"])){ $queryadd = "limit 0,5"; }else{ $queryadd = ""; }
$data = array();
if($type==0){ //all posts
	$query = "select * from post order by tanggal desc ".$queryadd;
}else{
	$query = "select * from post where tipe=".($type-1)." order by tanggal desc ".$queryadd;
}
$result = mysql_query($query,$db);
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

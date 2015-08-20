<script>
	var lats = [];
	var lngs = [];
</script>

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sistem Pelacakan';
?>
<div class="site-profile">
	<div class="row">
	    <div class="col-xs-12 col-sm-6 col-lg-8">
	    	<div class="panel panel-default">
	    		<div class="panel-heading">
	    			<h2>Sistem Pelacakan</h2>
	    		</div>
	    		<div class="panel-maps">
	    			<div id="map-canvas"></div>
	    		</div>
				<div class="panel-heading">
					<?php
					/*if(isset($_GET["id"])){ $post_id = $_GET["id"]; }else{ $post_id = 0; }
					$query = "select * from post where id='$post_id'";
					$result = mysql_query($query,$koneksi);
					if($result){
						while($row = mysql_fetch_array($result)){
							echo "<center>Rekaman jejak dari objek pada tulisan \"".$row["judul"]."\"</center>";
						}
					}else{
						echo "Objek tidak terdefinisi";
					}*/
					?>
				</div>
				<?php
				/*$query = "select * from tracker where post_id='$post_id'";
				$result = mysql_query($query,$koneksi);
				if(mysql_num_rows($result)>0){
					while($row = mysql_fetch_array($result)){
						echo "<script>lats.push(".$row["lat"].");lngs.push(".$row["lng"].");</script>";
						$query2 = "select * from user where username = '".$row["username"]."'";
						$result2 = mysql_query($query2,$koneksi);
						while($row2 = mysql_fetch_array($result2)){
						?>
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-1">
									<div class="comment-photo"><img src="images/<?php echo $row2["foto"]; ?>"/></div>
								</div>
								<div class="col-md-11">
									<p><b><?php echo $row["username"]; ?></b> telah menemukannya di:<br/>
									<?php echo $row["lokasi"]; ?>, pada tanggal <?php echo $row["waktu"]; ?></p>
									<p>Catatan:<br/>
									<?php echo $row["teks"]; ?></p>
								</div>
							</div>
						</div>
						<?php
						}
					}
				}else{
					echo "Objek belum pernah ditemukan oleh pengguna lain";
				}*/
				?>
				<div class="panel-footer">
					<center><p><b>Tambahkan jejak</b></p></center>
					<form method="post" action="api/addtrack.php">
					<input type="hidden" id="postid" name="postid" value="<?php echo '1'; ?>">
					<input type="hidden" id="username" name="username" value="<?php echo Yii::$app->user->identity->username; ?>">
					<input type="hidden" id="latitude" name="lat">
					<input type="hidden" id="longitude" name="lng">
					<table class="mytable" align="center">
						<tr>
							<td width="60">Lokasi</td><td><input type="text" id="lokasi" class="form-control" name="lokasi" placeholder="Lokasi/alamat penemuan..."></td>
						</tr>
						<tr>
							<td></td><td>
								latitude = <span id="lat"></span><br/>
								longitude = <span id="lng"></span>
							</td>
						</tr>
						<tr>
							<td>Waktu</td><td><input type="text" name="waktu" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>"></td>
						</tr>
						<tr>
							<td style="vertical-align:top">Catatan</td><td><textarea name="teks" class="form-control"></textarea></td>
						</tr>
						<tr>
						<td></td><td align="right"><span class="input-group-btn">
							<input class="btn btn-default" type="submit" value="Tambah">
						</span></td>
						</tr>
					</table>
					</form>
				</div>
	    	</div>
	    </div>
	    <div class="col-xs-6 col-lg-4">
	    	<ul class="nav nav-pills nav-stacked" role="tablist">
				<li role="presentation">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="right-menu">
						<span class="glyphicon glyphicon-home" id="icon-menu"></span> Beranda <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
					<li role="presentation"><a id="right-menu" href="index.php?post_type=0">Semua tulisan</a></li>
						<li role="presentation"><a id="right-menu" href="index.php?post_type=1">Lost</a></li>
						<li role="presentation"><a id="right-menu" href="index.php?post_type=2">Found</a></li>
					</ul>
				</li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fprofile"><span class="glyphicon glyphicon-user" id="icon-menu"></span> Profil</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmessage"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=post%2Fcreate"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmypost"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>
</div>
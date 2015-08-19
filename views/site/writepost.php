<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Tambah Tulisan Baru';
?>
<div class="site-writepost">
	<div class="row">
	    <div class="col-xs-12 col-sm-6 col-lg-8">
	    	<div class="panel panel-default">
				<form action="../controllers/WritePostController.php" method="post" enctype="multipart/form-data">
		    		<div class="panel-body form-writepost">
		    			<h3>Tambah Tulisan Baru</h3><hr>
						<div class="col-md-8">
							<input type="text" name="judul" class="form-control" placeholder="Judul Tulisan">
							<p class="post-options">Jenis Berita: <input type="radio" name="type" value="0">Lost  <input type="radio" name="type" value="1">Found</p>
							<p>Gambar/Foto: <input type="file" name="foto"></p>
							<p>Konten Tulisan:</p>
							<textarea name="konten" class="form-control" rows="8"></textarea>
						</div>
						<div class="col-md-8">
							<input type="submit" value="Tulis" class="btn btn-success to-right">
						</div>
		    		</div>
				</form>
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
				<li role="presentation"><a id="right-menu" href="message.php"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation" class="dropdown active"><a href="#"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="home.php"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>
</div>
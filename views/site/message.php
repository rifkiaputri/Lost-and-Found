<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Pesan';
?>
<div class="site-profile">
	<div class="row">
	    <div class="col-xs-12 col-sm-6 col-lg-8">
	    	<div class="panel panel-default">
	    		<div class="panel-body">
					<ul class="nav nav-tabs" role="tablist">
						<?php 
						
						if ($id == 0) { ?>
							<li role="presentation" class="active"><a href="index.php?r=site%2Fmessage&id=0">Pesan Masuk</a></li>
							<li role="presentation"><a href="index.php?r=site%2Fmessage&id=1">Pesan Keluar</a></li>
						<?php
						} else { ?>
							<li role="presentation"><a href="index.php?r=site%2Fmessage&id=0">Pesan Masuk</a></li>
							<li role="presentation" class="active"><a href="index.php?r=site%2Fmessage&id=1">Pesan Keluar</a></li>
						<?php
						}?>								
					</ul>
					
					<!-- List of messages -->
					<div class="panel panel-message">
						<?php if ($messages == []) {
							echo '<br><p>Tidak ada pesan.</p>';
						} else {
							foreach ($messages as $message): ?>
								<div class="panel-heading">
									<?php 
									if ($id == 1) { // pesan keluar
										echo '<h2>'.$message->ke.'</h2>';
									} else { // pesan masuk
										echo '<h2>'.$message->dari.'</h2>';
									} ?>
									<p><?= $message->tanggal ?></p>
								</div>	
								<div class="panel-body">
									<p><?= $message->isi ?></p>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<?php 
										if ($id != 1) {
											echo '<div class="col-md-6 right-align"><a href="index.php?r=messages%2Fcreate&to='.$message->dari.'"><span class="glyphicon glyphicon-share-alt right-align"></span> Reply</a></div>';
										} ?>
									</div>
								</div>	
							<?php endforeach;
						} ?>		
					</div>
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
				<li role="presentation" class="dropdown active"><a href="#"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=post%2Fcreate"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmypost"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>
</div>
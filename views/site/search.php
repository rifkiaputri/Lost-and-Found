<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Hasil pencarian';
?>
<div class="site-timeline">
	<div class="row">
		<?php if (Yii::$app->user->isGuest) {
			echo '<p>Anda harus <a href="index.php?r=user%2Fsecurity%2Flogin">login</a> terlebih dahulu.'; 
		} else { ?>
		    <div class="col-xs-12 col-sm-6 col-lg-8">
		    	<h4>Hasil pencarian untuk kata kunci: <?= $id ?></h4><br>
		    	<?php 
		    	if ($posts == []) {
		    		echo '<p>Tidak ditemukan.</p>';
		    	} else {
			    	foreach ($posts as $post): ?>
					<div class="panel panel-default">
			            <div class="panel-heading">
			                <a href="index.php?r=site%2Fdetailpost&id=<?= $post->id?>">
			                    <h2><?= $post->judul ?></h2>
			                </a>
			                <p>
			                    <i><?= $post->username ?>, <?= $post->tanggal ?></i>
			                </p>
			            </div>
			            <div class="panel-body">
			                <div class="post-img">
			                    <?php 
			                    if ($post->foto_konten != null) {
			                    	echo '<img src=\'images/'.$post->foto_konten.'\'>';
								} 
								?>
			                </div>
			                <br><p><?= $post->konten ?></p>
			            </div>
			            <div class="panel-footer">
			                <div class="row">
			                    <div class="col-md-6">
			                        <div class="post-label">
			                            <?php
			                            $post_type = $post->tipe;
			                            if ($post_type == 0){
											echo '<span class="label label-danger">LOST</span>';
										} else {
											echo '<span class="label label-success">FOUND</span>';
										}
										?>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="post-icon right-align">
			                            <a href="index.php?r=site%2Ftrack" id="right-menu">
			                                <span class="glyphicon glyphicon-screenshot"></span>
			                            </a>
			                            <a href="index.php?r=messages%2Fcreate&to=<?= $post->username?>" id="right-menu">
			                                <span class="glyphicon glyphicon-envelope"></span>
			                            </a>
			                            <a href="index.php?r=site%2Fdetailpost&id=<?= $post->id?>" id="right-menu">
			                                <span class="glyphicon glyphicon-comment"></span>
			                            </a>
			                        </div>
			                    </div>                          
			                </div>
			            </div>
			        </div>
		        <?php endforeach; }?>
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
		<?php } ?>
	</div>
</div>
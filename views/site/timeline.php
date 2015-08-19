<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Timeline';
?>
<div class="site-timeline">
	<div class="row">
	    <div class="col-xs-12 col-sm-6 col-lg-8">
	    	<?php foreach ($posts as $post): ?>
			<div class="panel panel-info">
	            <div class="panel-heading">
	                <a href="#">
	                    <h2><?= $post->judul ?></h2>
	                </a>
	                <p>
	                    <i><?= $post->username ?>, <?= $post->tanggal ?></i>
	                </p>
	            </div>
	            <div class="panel-body">
	                <div class="post-img">
	                    <img src=<?= $post->foto_konten ?>>
	                </div>
	                <p><?= $post->konten ?></p>
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
	                            <a href="#" id="right-menu">
	                                <span class="glyphicon glyphicon-screenshot"></span>
	                            </a>
	                            <a href="#" id="right-menu">
	                                <span class="glyphicon glyphicon-envelope"></span>
	                            </a>
	                            <a href="#" id="right-menu">
	                                <span class="glyphicon glyphicon-comment"></span>
	                            </a>
	                        </div>
	                    </div>                          
	                </div>
	            </div>
	        </div>
	        <?php endforeach; ?>
	    </div>
	    <div class="col-xs-6 col-lg-4">
	    	<ul class="nav nav-pills nav-stacked" role="tablist">
				<li role="presentation" class="dropdown active">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-home" id="icon-menu"></span> Beranda <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
					<li role="presentation"><a id="right-menu" href="timeline.php?post_type=0">Semua tulisan</a></li>
						<li role="presentation"><a id="right-menu" href="timeline.php?post_type=1">Lost</a></li>
						<li role="presentation"><a id="right-menu" href="timeline.php?post_type=2">Found</a></li>
					</ul>
				</li>
				<li role="presentation"><a id="right-menu" href="profile.php"><span class="glyphicon glyphicon-user" id="icon-menu"></span> Profil</a></li>
				<li role="presentation"><a id="right-menu" href="message.php"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation"><a id="right-menu" href="writepost.php"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="home.php"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>
</div>
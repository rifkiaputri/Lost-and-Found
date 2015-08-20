<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

if ($post->tipe == 0) {
	$this->title = 'Lost: ' . $post->judul;
} else {
	$this->title = 'Found: ' . $post->judul;
}
?>
<div class="site-timeline">
	<div class="row">
	    <div class="col-xs-12 col-sm-6 col-lg-8">
	    	<div class="panel panel-default">
                <div class="panel-heading">
                    <h2><?= $post->judul ?></h2>
	                <p>
	                    <i>oleh <?= $post->username ?>, pada <?= $post->tanggal ?></i>
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
                <!--List of comments-->
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="comment-photo">
                                <img src="images/titiankarir.jpg"></img>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <p><b>aisyahdz</b> pada 2015-08-19 12:20:30</p>
                            <p>up</p>
                        </div>
                    </div>
                </div>
                <form action="postcomment.php" method="post">
                    <input type="hidden" value=<?= Yii::$app->user->identity->username ?> name="username"></input>
                    <input type="hidden" value=<?= $post->id ?> name="postid"></input>
                    <div class="panel-footer">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="text" placeholder="Tulis komentar..." name="comment"></input>
                            <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" value="Kirim"></input>
                            </span>
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
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmessage"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=post%2Fcreate"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmypost"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>
</div>
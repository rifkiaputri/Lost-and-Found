<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profil';
?>
<div class="site-profile">
	<div class="row">
	    <div class="col-xs-12 col-sm-6 col-lg-8">
	    	<div class="panel panel-default">
	    		<div class="panel-heading">
	    			<h2>Profil</h2>
	    		</div>
	    		<div class="panel-body user-info">
	    			<div class="row">
                        <div class="col-xs-6 col-md-4">
                            <span id="foto" style="float:left">
                                <img src="images/default.jpg"></img>
                            </span>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <p></p><h4>Username:</h4>
                            <h2 id="nama">@<?= Yii::$app->user->identity->username ?></h2>
                            <h4><br>Email:</h4>
                            <h2 id="user_profile"><?= Yii::$app->user->identity->email ?></h2>
                        </div>
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
				<li role="presentation" class="dropdown active"><a href="#"><span class="glyphicon glyphicon-user" id="icon-menu"></span> Profil</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmessage"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=post%2Fcreate"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmypost"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>
</div>
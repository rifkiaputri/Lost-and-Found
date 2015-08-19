<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Tambah Tulisan Baru';
?>
<div class="post-create">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-8">
			<div class="panel panel-default">
			    <div class="panel-heading">
			    	<h2><?= Html::encode($this->title) ?></h2>
				</div>
				<div class="panel-body">
				    <?= $this->render('_form', [
				        'model' => $model,
				    ]) ?>
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
				<li role="presentation"><a id="right-menu" href="message.php"><span class="glyphicon glyphicon-envelope" id="icon-menu"></span> Pesan <span class="badge">0</span></a></li>
				<li role="presentation" class="dropdown active"><a href="#"><span class="glyphicon glyphicon-pencil" id="icon-menu"></span> Tambah Tulisan Baru</a></li>
				<li role="presentation"><a id="right-menu" href="index.php?r=site%2Fmypost"><span class="glyphicon glyphicon-file" id="icon-menu"></span> Tulisan Saya</a></li>
			</ul> 
	    </div>
	</div>

</div>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
//use app\models\PostSearch;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo-medium.png', ['class' => 'logo-container', 'alt' => Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $navItems = [];

    if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => 'Login', 'url' => ['/user/security/login']],['label' => 'Sign Up', 'url' => ['/user/registration/register']]);
    } else {
        array_push($navItems,['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]
        );
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);

    //$searchModel = new PostSearch();
    //$this->render('searchform', ['model' => $searchModel]);

    $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]);

    echo '<div class="search-form">
            
                <input type="text" name="query" placeholder="Type here to search..." class="search-placeholder" required>
                <span class="arrow">
                    <input type="submit" value="   " class="search-button">
                </span>
            
        </div>';

    ActiveForm::end();
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<?php
if (Yii::$app->user->isGuest) { ?>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; GTeam <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php } ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

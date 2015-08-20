<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Messages */
/* @var $form yii\widgets\ActiveForm */

$to = Yii::$app->request->get('to');
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dari')->hiddenInput(['maxlength' => true, 'value' => Yii::$app->user->identity->username])->label(false) ?>

    <?= $form->field($model, 'ke')->textInput(['maxlength' => true, 'value' => $to, 'readonly' => true])->label('Penerima') ?>

    <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kirim' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

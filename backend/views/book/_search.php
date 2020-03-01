<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'introtext') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'createdon') ?>

    <?php // echo $form->field($model, 'authors') ?>

    <?php // echo $form->field($model, 'article') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'pages') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'introtext')->textarea(['maxlength' => true, 'rows' => 3]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'createdon')->textInput() ?>

    <?= $form->field($model, 'authors')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'status')->dropDownList(['PUBLISH' => 'PUBLISH', 'MEAP' => 'MEAP']) ?>

    <?= $form->field($model, 'pages')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

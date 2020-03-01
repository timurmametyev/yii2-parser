<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Email */

$this->title = 'Update Email: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="email-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

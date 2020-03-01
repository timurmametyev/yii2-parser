<?php

/* @var $this yii\web\View */
/* @var $categories \common\models\Category */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row" style="display: flex;flex-flow: row wrap;">

            <?php foreach ($categories as $category): ?>
                <div class="col-lg-2 text-center">
                    <?= Html::img('@web/images/category/default.jpg', ['alt' => $category->title, 'style' => 'width:100%']) ?>
                    <h3><?= $category->title ?></h3>
                    <p><?= Html::a('Открыть', ['category/view', 'id' => $category->id], ['class' => 'btn btn-primary']) ?></p>
                </div>
            <?php endforeach; ?>

            <div class="col-lg-2 text-center">
                <?= Html::img('@web/images/category/default.jpg', ['alt' => $category->title, 'style' => 'width:100%']) ?>
                <h3>Каталог</h3>
                <p><?= Html::a('Открыть', ['category/'], ['class' => 'btn btn-primary']) ?></p>
            </div>

        </div>
    </div>
</div>

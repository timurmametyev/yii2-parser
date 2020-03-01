<?php

/* @var $this yii\web\View */
/* @var $categories \common\models\Category */

use yii\helpers\Html;
use yii\widgets\Menu;
use frontend\components\MenuWidget;

$this->title = 'Список всех категорий сайта';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-md-3">
                <ul><?= MenuWidget::widget() ?></ul>
            </div>
            <div class="col-md-9">
                <div class="row" style="display: flex;flex-flow: row wrap;">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-lg-2 text-center">
                            <?= Html::img('@web/images/category/default.jpg', ['alt' => $category->title, 'style' => 'width:100%']) ?>
                            <h3><?= $category->title ?></h3>
                            <p><?= Html::a('Открыть', ['category/view', 'id' => $category->id], ['class' => 'btn btn-primary']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

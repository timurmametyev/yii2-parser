<?php

/* @var $this yii\web\View */
/* @var $category \common\models\Category */

use yii\helpers\Html;
use yii\widgets\Menu;
use frontend\components\MenuWidget;

if (!empty($category))
    $this->title = 'Список одной категории: ' . $category->title;
else
    $this->title = 'Категория не найдена';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-md-3">
                <h3>Меню</h3>
                <ul><?= MenuWidget::widget() ?></ul>
            </div>
            <?php if (!empty($category)): ?>
                <div class="col-md-9">
                    <h3><?= $category->title ?></h3>
                    <div class="row" style="display: flex;flex-flow: row wrap;">
                        <?php foreach ($books as $book): ?>
                            <div class="col-lg-3 text-center">
                                <?= Html::img('@web/images/books/' . $book->img, ['alt' => $book->title, 'style' => 'width:100%']) ?>
                                <h3><?= $book->title ?></h3>
                                <p><?= Html::a('Открыть', ['book/view', 'id' => $book->id], ['class' => 'btn btn-primary']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-9">
                    <div class="row">
                        Not Found
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

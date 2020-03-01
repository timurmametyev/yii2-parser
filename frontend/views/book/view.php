<?php

/* @var $this yii\web\View */
/* @var $book \common\models\Book */
/* @var $category \common\models\Category */
/* @var $similar \common\models\Book */

use yii\helpers\Html;
use yii\widgets\Menu;
use frontend\components\MenuWidget;
use yii\helpers\Url;

if (!empty($book))
    $this->title = 'Страница книги: ' . $book->title;
else
    $this->title = 'Книга не найдена';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-md-3">
                <h3>Меню</h3>
                <ul><?= MenuWidget::widget() ?></ul>
            </div>
            <div class="col-md-9">
                <h3><?= $book->title ?></h3>
                <div class="row">
                    <div class="col-md-4">
                        <?= Html::img('@web/images/books/' . $book->img, ['alt' => $book->title, 'style' => 'width:100%']) ?>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Категория: </b> <a href="<?= Url::toRoute(['category/view', 'id' => $category->id]) ?>"><?= $category->title ?></a></li>
                            <li class="list-group-item"><b>Дата создания: </b> <?= $book->createdon ?></li>
                            <li class="list-group-item"><b>Авторы: </b> <?= $book->authors ?></li>
                            <li class="list-group-item"><b>Артикль: </b> <?= $book->article ?></li>
                            <li class="list-group-item"><b>Статус: </b> <?= $book->status ?></li>
                            <li class="list-group-item"><b>Кол-во страниц: </b> <?= $book->pages ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Содержание</h3>
                        <?= $book->content ?>
                    </div>
                </div>
                <?php if (!empty($similar)): ?>
                    <div class="row">
                        <h3>Книги из этой категории:</h3>
                        <?php foreach ($similar as $item): ?>
                            <div class="col-lg-3 text-center">
                                <?= Html::img('@web/images/books/' . $item->img, ['alt' => $item->title, 'style' => 'width:100%']) ?>
                                <h3><?= $item->title ?></h3>
                                <p><?= Html::a('Открыть', ['book/view', 'id' => $item->id], ['class' => 'btn btn-primary']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

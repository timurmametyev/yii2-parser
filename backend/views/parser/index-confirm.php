<?php
use yii\helpers\Html;

/* @var $output \common\models\Parser */

$this->title = 'Parser result';
?>
<p>Результаты парсинга:</p>

<h3>Категории</h3>
<ul>
    <li>Создано категорий: <?= $output['categories_success'] ?></li>
    <li>Ошибок: <?= $output['categories_error'] ?></li>
    <li>Дубликатов категорий: <?= $output['categories_duplicate'] ?></li>
</ul>

<h3>Книги</h3>
<ul>
    <li>Создано книг: <?= $output['books_success'] ?></li>
    <li>Ошибок: <?= $output['books_error'] ?></li>
    <li>Дубликатов книг: <?= $output['books_duplicate'] ?></li>
</ul>
<?php

/* @var $category \frontend\components\MenuWidget */

use yii\helpers\Url;

?>

<li>
    <a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['title'] ?></a>
    <?php if (isset($category['children'])): ?>
        <ul>
            <?= $this->getMenu($category['children']) ?>
        </ul>
    <? endif; ?>
</li>
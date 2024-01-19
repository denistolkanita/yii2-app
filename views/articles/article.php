<?php
/* @var $this View */
/* @var $article */

use yii\web\View;
?>

<div>
    <h2><?= $article->title ?></h2>
    <p><?= $article->text ?></p>
    <p><?= $article->date ?></p>
    <span><?= $article->author_id ?> <?= $article->likes ?> <?= $article->hits ?></span>
</div>

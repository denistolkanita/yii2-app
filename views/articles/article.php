<?php
/* @var $this View */
/* @var $article */

use yii\web\View;
use yii\helpers\Url;
?>

<div>
    <a href="<?= Url::to(['articles/articles'])?>">Back</a>
    <h2><?= $article->getFullTitle($article->title) ?></h2>
    <p><?= $article->text ?></p>
    <p><?= $article->date ?></p>
    <span><?= $article->author_id ?> <?= $article->completeLikes($article->likes) ?> <?= $article->completeViews($article->hits) ?></span>
</div>

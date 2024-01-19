<?php
/* @var $this View */
/* @var $articles */

use yii\web\View;
use yii\helpers\Url;
?>

<div id="articles">
    <div class="jumbotron">
        <div class="row">
            <?php foreach($articles as $article): ?>
                <a href="<?= Url::to(['articles/article', 'id' => $article->id])?>"><?= $article->title ?></a>
                <p><?= $article->text ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
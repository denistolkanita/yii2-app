<?php
/* @var $this View */
/* @var $articles */

use yii\web\View;
?>

<div id="articles">
    <div class="jumbotron">
        <div class="row">
            <?php foreach($articles as $article): ?>
                <h2><?= $article->title ?></h2>
                <p><?= $article->text ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php
/* @var $this View */
/* @var $articles */

use yii\web\View;
use yii\helpers\Url;
?>

<div id="pages">
    <a href="<?= Url::to(['article/create']) ?>">Create article</a>
</div>
<br>

<div id="articles">
    <div class="jumbotron">
        <div class="row">
            <?php foreach($articles as $article): ?>
                <a href="<?= Url::to(['article/article', 'id' => $article->id])?>"><?= $article->getFullTitle($article->title) ?></a>
                <p><?= $article->getShortText($article->text) ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
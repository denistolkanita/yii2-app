<?php
/* @var $this View */
/* @var $articles */
/* @var $pagination */

use yii\web\View;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
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
            <!-- Line below have the same output as `<p><?= $article->getShortText($article->text) ?></p>`-->
                <?= Html::tag('p', $article->getShortText($article->text)) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="pagination">
    <?php try {
        echo LinkPager::widget(['pagination' => $pagination]);
    } catch (Throwable $e) {
    } ?>
</div>
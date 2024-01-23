<?php

use app\models\Article;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $article */

$model = new Article();

$form = ActiveForm::begin([
    'id' => 'edit-article',
    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart-formdata'],
]) ?>

<div id="links">
    <a href="<?= Url::to(['article/article', 'id' => $article->id]) ?>">Back</a>
</div>
<br>

<?=$form->field($model,'title')->textInput(['value'=>$article->title])?>
<?=$form->field($model,'text')->textarea(['value'=>$article->text])?>
<?=$form->field($model,'author_id')->textInput(['value'=>$article->author_id])?>
<?=$form->field($model,'alias')->textInput(['value'=>$article->alias])?>



<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Edit', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>





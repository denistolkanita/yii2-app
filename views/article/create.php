<?php

use app\models\Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new Article();

$form = ActiveForm::begin([
    'id' => 'create-article',
    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart-formdata'],
]) ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'text')->textarea() ?>
<?= $form->field($model, 'author_id')->textInput() ?>
<?= $form->field($model, 'alias')->textInput() ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>





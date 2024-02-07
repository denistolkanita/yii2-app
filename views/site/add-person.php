<?php

use app\models\Person;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$model = new Person(); ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'age') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'country') ?>
<?= $form->field($model, 'tags') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
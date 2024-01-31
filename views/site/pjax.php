<?php
/* @var $this View */
/* @var $article */

use yii\web\View;
use yii\helpers\Url;
use yii\widgets\Pjax;
?>

<?php Pjax::begin(); ?>
    <a href="<?= Url::to(['site/pjax-step']) ?>">Press here to load next step with AJAX!</a>
<?php Pjax::end(); ?>


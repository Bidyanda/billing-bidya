<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Item $model */
/** @var yii\widgets\ActiveForm $form */
$options = Yii::$app->params['bs5_floating_label_options'];
$template = Yii::$app->params['bs5_floating_label_template'];
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name',['options'=>$options,'template'=>$template])->textInput(['placeholder'=>'','auto-complete'=>'off']) ?>

    <?= $form->field($model, 'rate',['options'=>$options,'template'=>$template])->textInput(['placeholder'=>'','auto-complete'=>'off']) ?>
    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

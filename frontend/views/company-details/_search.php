<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\CompanyDetailsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'mobile_no') ?>

    <?= $form->field($model, 'alt_mobile_no') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'contact_name') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'account_holder_name') ?>

    <?php // echo $form->field($model, 'account_no') ?>

    <?php // echo $form->field($model, 'ifsc_code') ?>

    <?php // echo $form->field($model, 'branch_name') ?>

    <?php // echo $form->field($model, 'gpay_no') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

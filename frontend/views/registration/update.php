<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrationItem $model */

$this->title = 'Update Registration Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registration Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registration-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

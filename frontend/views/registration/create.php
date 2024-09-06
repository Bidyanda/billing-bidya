<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrationItem $model */

$this->title = 'Create Registration Item';
$this->params['breadcrumbs'][] = ['label' => 'Registration Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

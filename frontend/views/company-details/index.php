<?php

use frontend\models\CompanyDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\CompanyDetailsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Company Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_name',
            'address:ntext',
            'mobile_no',
            'alt_mobile_no',
            //'email:email',
            //'contact_name',
            //'logo',
            //'account_holder_name',
            //'account_no',
            //'ifsc_code',
            //'branch_name',
            //'gpay_no',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CompanyDetails $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

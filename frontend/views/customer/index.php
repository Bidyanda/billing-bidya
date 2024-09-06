<?php

use frontend\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Add new Customer', ['create'], ['class' => 'btn btn-success openModal','size'=>'lg','header'=>'Add New Customer']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card card-default">
        <div class="card card-body table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'address:ntext',
                    'created_at',
                    'created_by',
                    //'record_status',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{view}  {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model)  {
                                return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', $url, ['class' => '', 'title' => 'View']);
                            },
                            'update' => function ($url, $model) {
                                // if($model->status == 1 && Yii::$app->user->can('admin'))
                                    return Html::a('<i class="fa fa-edit" aria-hidden="true"></i>', $url, ['class' => 'openModal','size'=>'xl','header'=>'Update Upload Files', 'title' => 'Update']);
                            },
                            'delete' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-trash text-danger" aria-hidden="true"></i>', $url, ['data-confirm' => 'Are you sure to delete this item?','data-method'=>'post']);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
    


</div>

<?php

use frontend\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Add New Item', ['create'], ['class' => 'btn btn-success openModal','size'=>'sm','header'=>'Add New Item']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card card-default">
        <div class="card card-body table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    'name',
                    'rate',
                    // 'created_at',
                    // 'created_by',
                    //'record_status',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                // if($model->status == 1 && Yii::$app->user->can('admin'))
                                    return Html::a('<i class="fa fa-edit" aria-hidden="true"></i>', $url, ['class' => 'openModal','size'=>'sm','header'=>'Update Item', 'title' => 'Update']);
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

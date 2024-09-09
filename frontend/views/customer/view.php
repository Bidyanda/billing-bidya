<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Customer $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <div class="row">
        <div class="col-md-12 fs-1 text-center">TAX INVOICE</div>
        <div class="col-md-12 text-center">Invoice# INV-00101</div><br><br>
        <div class="col-md-6">
            <div style="padding-left:50px">
                <div> Bill To</div>
                <div class='fw-bold'><?= $model->name?></div>
                <div><?= $model->address?></div>
                <div><?= $model->district?></div>
                <div><?= $model->pincode?></div>
                <div>India</div>
            </div>
        </div>
        <div class="col-md-6">
            <div style="padding-left:400px">
                <div class='fw-bold'><?= $company->company_name?></div>
                <div class='fw-bold'><?= $company->address?></div>
                <div><?= $company->address?></div>
                <div><?= $company->email?></div>
                <div></div>
                <div>Invoice Date: <?= date('d/mm/Y',strtotime($model->created_at))?></div>
            </div>
        </div><br><br>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item & Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
            </thead>
            
        </table>
    </div>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\CompanyDetails $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$fullName = $model->company_name;

// Split the full name into an array of words
$nameParts = explode(" ", $fullName);

// Get the first letter of each word and concatenate them
$initials = "";
foreach ($nameParts as $part) {
    $initials .= strtoupper($part[0]);
}

?>
<div class="company-details-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <section class="section1">
        <label class='header-label'>Company Profile</label>
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-3 text-center profile-name text-center">
                        <div class="short-name fs-3"><?= $initials?></div>
                        <span class="text-uppercase  profile"><?= $model->company_name?></span><br>
                        <span class="text-capitalize  profile-label">Company Name</span>
                    </div>
                    <div class="col-md-3  text-start">
                        <div class="mb-3">
                            <span class="text-uppercase profile"><?= $model->address?></span><br>
                            <span class="text-capitalize profile-label ">Address</span>
                        </div>
                        <div>
                            <span class="text-uppercase profile"><?= $model->email?></span><br>
                            <span class="text-capitalize profile-label ">Email ID</span>
                        </div>
                    </div>
                    <div class="col-md-3 text-start">
                        <div class="mb-3">
                            <span class="text-uppercase profile"><?= $model->contact_name?></span><br>
                            <span class="text-capitalize profile-label ">Contact Name</span>
                        </div>
                        <div>
                            <span class="text-uppercase profile"><?= $model->mobile_no ?></span><br>
                            <span class="text-capitalize profile-label ">Mobile Number</span>
                        </div>
                    </div>
                    <div class="col-md-2 text-start">
                        <div>
                            <span class="text-uppercase profile"><?= $model->alt_mobile_no?></span><br>
                            <span class="text-capitalize profile-label">Alternative Mobile No.</span>
                        </div>
                    </div>
                    <div class="col-md-1 text-end" ><i class="fas fa-pencil" id='edit'></i></div>
                </div>
            </div>
        </label>
    </section>
    <section class="section1">
        <label class='header-label'>Company Bank Details</label>
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-3 text-center text-center">
                        <div class="mb-3">
                            <span class="text-uppercase profile"><?= $model->account_holder_name?></span><br>
                            <span class="text-capitalize profile-label ">Account Holder Name</span>
                        </div>
                    </div>
                    <div class="col-md-3  text-start">
                        <div class="mb-3">
                            <span class="text-uppercase profile"><?= $model->account_no?></span><br>
                            <span class="text-capitalize profile-label ">Account Number</span>
                        </div>
                        <div>
                            <span class="text-uppercase profile"><?= $model->ifsc_code?></span><br>
                            <span class="text-capitalize profile-label ">IFSC Code</span>
                        </div>
                    </div>
                    <div class="col-md-3 text-start">
                        <div class="mb-3">
                            <span class="text-uppercase profile"><?= $model->branch_name?></span><br>
                            <span class="text-capitalize profile-label ">Branch Name</span>
                        </div>
                        <div>
                            <span class="text-uppercase profile"><?= $model->gpay_no?></span><br>
                            <span class="text-capitalize profile-label ">Gpay Number</span>
                        </div>
                    </div>
                </div>
            </div>
        </label>
    </section>
</div>
<style>
    .short-name {
        border: 1px solid #bbb9b9;
        border-radius: 49px;
        padding: 20px;
        background-color: white;
        /* position: absolute; */
        /* z-index: 1000; */
        /* top: -58px; */
        margin-top:-15%;
        font-weight: 700;
    }
    .profile-name {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-right-style: solid;
        border-right-color: #e3d6d6;
        border-right-width: thin;
        /* position: relative; */
    }
    .profile-label {
    font-size: 13px;
    }
    .profile {
        font-size: 15px;
        font-weight: 500;
    }
    .header-label {
        position: absolute;
        z-index: 100;
        top: -12px;
        background-color: #f7f7f7;
        color: #040303;
        font-weight: bold;
        font-size: 15px;
        padding: 0px 5px 0px 5px;
    }
    #edit {
        cursor: pointer;
        color: blue;
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #58444442;
    }
</style>
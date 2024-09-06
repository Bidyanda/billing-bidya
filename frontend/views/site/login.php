<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
$options = Yii::$app->params['bs5_floating_label_options'];
$template = Yii::$app->params['bs5_floating_label_template'];
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->
    <div class="design">
        <div class="text-center head-data">
            <img class="loginlogo" src="/images/hcm_logo.png"><br>
            <h6 class='text-center text-capitalize fw-bold text-primary'><?= Yii::$app->name?></h6>
            <!-- <hr width="20%" class="mx-auto text-muted"> -->
        </div>
        <div id='flexbox'>
            <div class="login">
                <h5 class="text-primary text-bold text-center">Login</h5>
                <p>Please fill out the following fields to login:</p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Username','autocomplete'=>'off'])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false) ?>

                    <!-- <?//= $form->field($model, 'rememberMe')->checkbox() ?> -->

                    <div class="form-group text-center">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    
</div>
<style>
   
    /* .design {
        margin-left: 25%;
        margin-right: 25%;
        padding-top: 39px;
        padding-bottom: 20px;
        background-color: #f7eeee;
        border-radius: 10px;
    } */
    /* .site-login{
        margin-top:5%;
    } */
        /* .head-data {
        position: absolute;
        left: 42%;
        margin-top: -26%;
        z-index: 1000;
    } */
    .login{
        border:1px solid #dbd5d5;
        border-radius:5px;
        padding: 10px 40px 10px 40px;
        background-color:#ffffff;
        box-shadow: 3px 5px 19px 2px #d5c7c7;
    }
    #flexbox{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      /* position: relative; */
    }
    .loginlogo {
    max-width: 110px;
    }
    @media(max-width:480px) {
        .loginlogo {
            max-width: 300px;
        }
    }
    @media(max-width:320px) {
        .loginlogo {
            max-width: 240px;
        }
    }
</style>
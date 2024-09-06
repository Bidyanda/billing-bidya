<?php
use yii\helpers\Html;
$web =  Yii::getAlias('@web');
/* (C) Copyright 2019 Heru Arief Wijaya (http://belajararief.com/) untuk Indonesia.*/

?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<!-- Topbar Navbar -->
<?php if(Yii::$app->user->isGuest){ ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <?= Yii::$app->name?>
                    <!-- <?//= Html::a("<img src = '$web/images/banner.png' height='55'>",['/'],['class'=>'text-white'])?> -->
                </li>
              </ul>
        </div>
<?php } ?>
<ul class="navbar-nav ml-auto">
    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <!-- <?//= Html::a("<img src='images/logo.jpg' id='logo'/>",['/'],['class'=>'navbar-brand'])?> -->
            </li>
            </ul>
        </div>
    <li class="nav-item dropdown no-arrow d-sm-none">
    <!-- Dropdown - Messages -->
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
    <!-- Dropdown - Alerts -->
    </li>
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- <li class="nav-item dropdown no-arrow">
        <?php //if(!Yii::$app->user->isGuest): ?>
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?//= Yii::$app->user->identity->username;?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Password Reset</a>
                <div class="dropdown-divider"></div>
                <?//= Html::a(
                //     'Logout',
                //     ['/site/logout'],
                //     ['data-method' => 'post', 'class' => 'dropdown-item']
                // ) ?>
            </div>
        <?php // else: ?>
            <?//= Html::a('Login', ['/site/login'], ['class' => 'nav-link']) ?>
        <?php // endif; ?>
    </li> -->

</ul>

</nav>
<!-- End of Topbar -->
<style>
    img#logo {
    margin-top: -11px;
    margin-bottom: -11px;
    width: 11.5%;
}
#content {
    display: flex;
    flex-direction: column;
    min-height: calc(100vh - 78px);
}
</style>
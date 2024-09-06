<?php
use yii\helpers\Html;

/* (C) Copyright 2019 Heru Arief Wijaya (http://belajararief.com/) untuk Indonesia.*/

?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<!-- <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button> -->

    <!-- Topbar Search -->
    <!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
    </li>
    <!-- Nav Item - Alerts -->
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <?php if(!Yii::$app->user->isGuest): ?>
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= Yii::$app->user->identity->username;?></span>
                <img class="img-profile rounded-circle" src="/images/avatar.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?= Html::a('<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Change Password',['/site/change-password'],['class'=>'dropdown-item']) ?>    
                <div class="dropdown-divider"></div>
                <?= Html::a(
                    'Logout',
                    ['/site/logout'],
                    ['data-method' => 'POST', 'class' => 'dropdown-item']
                ) ?>
            </div>
        <?php else: ?>
            <?= Html::a('Login', ['/site/login'], ['class' => 'nav-link']) ?>
        <?php endif; ?>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
<style>
    .btn-link {
    font-weight: 400;
    color: #55cb10;
    text-decoration: none;
}
.btn-link:hover {
    color: #55cb10;
    text-decoration: underline;
}
#content {
    display: flex;
    flex-direction: column;
    min-height: calc(100vh - 78px);
}

</style>
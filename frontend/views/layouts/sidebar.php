<?php
use hoaaah\sbadmin2\widgets\Menu;

echo Menu::widget([
    'options' => [
        'ulClass' => "navbar-nav bg-gradient-primary sidebar sidebar-dark accordion",
        'ulId' => "accordionSidebar"
    ], //  optional
    'brand' => [
        'url' => ['/'],
        'content' => <<<HTML
            <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-receipt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Billing</div>        
HTML
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => ['/site/index'], //  Array format of Url to, will be not used if have an items
            'icon' => 'fas fa-fw fa-tachometer-alt', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'options' => [
            //     'liClass' => 'nav-item',
            // ] // optional
        ],
        [
            'type' => 'divider', // divider or sidebar, if not set then link menu
            // 'label' => '', // if sidebar we will set this, if divider then no

        ],
        [
            'label' => 'Customer',
            'url' => ['/customer/index'], //  Array format of Url to, will be not used if have an items
            'icon' => 'fas fa-users', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'options' => [
            //     'liClass' => 'nav-item',
            // ] // optional
        ],
        [
            'label' => 'Setting',
            'icon' => 'fa-solid fa-gears', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Company Profile',
                    'url' => ['/company-details/index'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Item',
                    'url' => ['/item/index'], //  Array format of Url to, will be not used if have an items
                ],
            ]
        ]
    ]
]);
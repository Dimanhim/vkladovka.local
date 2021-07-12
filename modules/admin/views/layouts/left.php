<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Имя админа</p>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    //['label' => 'Добавить вещь', 'icon' => 'file-code-o', 'url' => ['thing/add']],
                    [
                        'label' => 'Вещи',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Все вещи', 'icon' => 'file-code-o', 'url' => ['thing/index'],],
                            ['label' => 'Категории', 'icon' => 'file-code-o', 'url' => ['cat/index'],],
                        ],
                    ],
                    ['label' => 'Пользователи', 'icon' => 'file-code-o', 'url' => ['users/index']],
                    [
                        'label' => 'Заказы',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Хранения', 'icon' => 'file-code-o', 'url' => ['storage/index'],],
                            ['label' => 'Возвраты', 'icon' => 'file-code-o', 'url' => ['return/index'],],
                            ['label' => 'Грузоперевозки', 'icon' => 'file-code-o', 'url' => ['pickup/index'],],
                            ['label' => 'На аренду', 'icon' => 'file-code-o', 'url' => ['rent/index'],],
                            ['label' => 'На сдачу в аренду', 'icon' => 'file-code-o', 'url' => ['rent-thing/index'],],
                            ['label' => 'На тару/упаковку', 'icon' => 'file-code-o', 'url' => ['package-orders/index'],],
                        ],
                    ],
                    
                    ['label' => 'Обратная связь', 'icon' => 'dashboard', 'url' => ['feedback/index']],
                    ['label' => 'Отзывы', 'icon' => 'dashboard', 'url' => ['review/index']],
                    ['label' => 'Тара/упаковка', 'icon' => 'dashboard', 'url' => ['package/index']],
                    ['label' => 'Таблица лояльности', 'icon' => 'dashboard', 'url' => ['loyalty/index']],
                    ['label' => 'Настройки', 'icon' => 'file-code-o', 'url' => ['settings/index']],
                    ['label' => 'Контент', 'icon' => 'file-code-o', 'url' => ['content/index']],
                    [
                        'label' => 'Системные функции',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

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
                    ['label' => 'Добавить вещь', 'icon' => 'file-code-o', 'url' => ['thing/add']],
                    ['label' => 'Категории вещей', 'icon' => 'file-code-o', 'url' => ['cat/index']],
                    ['label' => 'Все вещи', 'icon' => 'file-code-o', 'url' => ['thing/index']],
                    ['label' => 'Пользователи', 'icon' => 'file-code-o', 'url' => ['users/index']],
                    ['label' => 'Заказы хранения', 'icon' => 'dashboard', 'url' => ['storage/index']],
                    ['label' => 'Возвраты', 'icon' => 'dashboard', 'url' => ['return/index']],
                    ['label' => 'Обратная связь', 'icon' => 'dashboard', 'url' => ['feedback/index']],
                    ['label' => 'Отзывы', 'icon' => 'dashboard', 'url' => ['review/index']],
                    ['label' => 'Грузоперевозки', 'icon' => 'dashboard', 'url' => ['pickup/index']],
                    [
                        'label' => 'Тара/упаковка',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Просмотр', 'icon' => 'file-code-o', 'url' => ['package/index'],],
                            ['label' => 'Заказы', 'icon' => 'dashboard', 'url' => ['package-orders/index'],],
                        ],
                    ],
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

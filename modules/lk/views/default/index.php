<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Мой склад';
?>

<!-- ---------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Мои вещи</li>
</ul>
<!-- Хлебные крошки -->

    <div class="col-md-6">
        <h2 class="tac" style="margin-bottom: 10px;">Мои вещи</h2>
    </div>
    <div class="col-md-6">
        <a href="#" class="show-content">Как получить доход не сдавая вещи в аренду?</a>
        <div class="hide-content">
            <ul class="style-list">
                <li>зарегистрируйтесь</li>
                <li>подключите бонус «партнерство»</li>
                <li>получите свой персональный QR-код</li>
                <li>распечатайте, в отдельных случаях мы сами его распечатываем и устанавливаем для Вас,  или предложите сканировать его со своего смартфона другим участникам</li>
                <li>как только они воспользуются предложением Вкладовка через Ваш QR-код, вы получаете 10% поступлений от них на свой счет в течении всего срока их пользования*. Им в свою очередь выгодно воспользоваться  Вашим QR-кодом, поскольку они также получают бонус в 5% от стоимости хранения**</li>
            </ul>
            <p>
                К примеру, через Ваш QR-код воспользовалось услугой хранения 10 человек в месяц на сумму 150руб/в месяц каждый. Средняя продолжительность хранения 6 месяцев. За это время Вы получаете 150руб.в первый месяц, 300 руб. во второй( набралось еще 10человек), 450 руб. в третий, 600 руб. в четвертый, 750 в пятый, 900 руб. в шестой. Всего за полгода более 3000руб. Практически ничего не делая, просто разместив свой QR-код, который работает на Вас.
            </p>
            <div class="quote">
                <p>
                    * Партнерская программа в тестовом режиме работает 1 год. Возможны изменения.
                </p>
                <p>
                    **Бонусы  предоставляются только на услугу хранения.
                </p>
            </div>

        </div>
    </div>

<?php if($model) : ?>
    <div class="col-md-12 error">
        <p></p>
    </div>
    <div class="clearfix"></div>
<?php foreach($model as $v) : ?>
    <div class="product-one col-4 product-one">
        <div class="">
            <div class="item-thing">
                <div class="item-img">
                    <img src="<?= Yii::getAlias('@thing').'/'.$v->img ?>" alt=""/>
                </div>
                <div class="description">
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>"><?= $v->name ?></a>
                </div>
                <div class="checkbox" data-thing="<?= $v->id ?>">
                    <input type="checkbox" />
                </div>
                <div class="back"></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else : ?>
    <div class="col-md-12">
        <p>
            У Вас пока что нет вещей в системе
        </p>
    </div>
<?php endif; ?>


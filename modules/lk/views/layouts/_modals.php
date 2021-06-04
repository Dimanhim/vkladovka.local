<!-- Обратный звонок менеджеру -->
<div class="modal fade" id="call-to-operator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Оставьте свои контактные данные</h4>
                <p>Содержимое данного окна предоставь мне пожалуйста</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="text" class="form-control" placeholder="Введите имя">
                    <input type="text" class="form-control" placeholder="Введите еще что нибудь">
                    <button class="btn btn-success">Заказать звонок</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Описание вещей своими словами -->
<div class="modal fade" id="pickup-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Здесь будет пример описания вещей своими словами</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Крупная вещь</h3>
                <ol>
                    <li>Вес - </li>
                    <li>Габариты - </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Описание категорий вещей -->
<div class="modal fade" id="storage-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Описание категорий вещей</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>
                        Стандартный предмет- обувь, одежда, игрушки, книги, сумки мелко бытовая техника или другие предметы , которые могут поместиться в вашей ручной клади
                    </li>
                    <li>
                        Крупный предмет- велосипед, рюкзак, лыжи, гитара, стулья, большие сумки, шины, коляски , телевизоры и т.п.
                    </li>
                    <li>
                        Закрытый контейнер- коробка с вещами, упакованный чемодан, объемом не более 0,3куб.м или 25 кг веса.
                    </li>
                    <li>
                        Мебель- все что объемом  более 0,3 куб.м или массой более 25 кг
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Звонок оператору -->
<div class="modal fade" id="call-operator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>При хранении трех и более вещей Вы можете заказать звонок оператору и заявку заполнят за Вас</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="#" class="btn btn-success call-to-operator">Звонок оператору</a>
            </div>
        </div>
    </div>
</div>
<!-- Продлить хранение -->
<div class="modal fade" id="extend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Продлить хранение "Вещь такая-то"</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/extend']) ?>" class="btn btn-primary">Продлить только на эту вещь</a>
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/extend-all']) ?>" class="btn btn-default">Продлить на все вещи</a>
            </div>
        </div>
    </div>
</div>
<!-- Тарифы по срочной доставке -->
<div class="modal fade" id="tariffs-return" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Тарифы по срочной доставке</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Доставка(забор вещи) осуществляется с 8 до 20часов. Доставка  за рамками данного времени по желанию заказчика +50% к тарифу, включая срочный тариф.</li>
                    <li>Тариф по срочной доставке за каждую вещь( кроме мебели):
                        <ul>
                            <li>-в течении дня- 200руб</li>
                            <li>- в течении 2-3 часов- 400 руб.</li>
                            <li>- течении 2-3 часов 350 руб за каждую вещь, если их 2 и более.</li>
                            <li>- в течении 1 часа- 800 руб.</li>
                        </ul>
                    </li>
                    <li>Доставка мебели в течении дня+ 50% к обычному тарифу.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Партнерская программа -->
<div class="modal fade" id="bank-partner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Что за партнерская программа</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Здесь будет текст о партнерской программе
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Заказать хранение -->
<div class="modal fade" id="storage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Для получения данной услуги вам необходимо авторизоваться на сайте</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>" class="btn btn-primary">Войти в систему</a>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/registration']) ?>" class="btn btn-default">Зарегистрироваться</a>
            </div>
        </div>
    </div>
</div>

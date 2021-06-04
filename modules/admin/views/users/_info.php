<!-- Вещи -->
<div class="container user-dropdown" data-type="things">
    <div class="row">
        <div class="col-md-12">
            <h2>Вещи пользователя</h2>
            <?php if($things) : ?>
                <?php $count = 1; ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Фото</th>
                        <th>QR код</th>
                    </tr>
                    <?php foreach($things as $thing) : ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $thing->id]) ?>"><?= $thing->name ?></a></td>
                            <td>
                                <img class="img-preview" src="<?= Yii::getAlias('@thing').'/'.$thing->img ?>" alt="">
                            </td>
                            <td>
                                <?php if($thing->qr_code) : ?>
                                    <?php $qr_code = $thing->getQrCode(true) ?>
                                    <a href="<?= $qr_code ?>" download="" target="_blank">
                                        <img src="<?= $qr_code ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </td>
                            </td>
                        </tr>
                        <?php $count++ ?>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                У выбранного пользователя вещей на хранение не найдено
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Отзывы -->
<div class="container user-dropdown" data-type="reviews">
    <div class="row">
        <div class="col-md-12">
            <h2>Отзывы пользователя</h2>
            <?php if($reviews) : ?>
                <?php $count = 1; ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Вступительный текст</th>
                        <th>Текст</th>
                        <th>Дата создания</th>
                    </tr>
                    <?php foreach($reviews as $review) : ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td>
                                <?= $review->preview ?>
                            </td>
                            <td>
                                <?= $review->content ?>
                            </td>
                            <td>
                                <?= date('d.m.Y H:i', $review->created_at) ?>
                            </td>
                        </tr>
                        <?php $count++ ?>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                У выбранного пользователя вещей на хранение не найдено
            <?php endif; ?>
        </div>
    </div>
</div>

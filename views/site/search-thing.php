<?php if($model) : ?>
    <div class="container" style="margin: 10px auto;">
        <div class="row wp-prs" style="border: none">
            <?php foreach($model as $v) : ?>
                <div class="product-one col-4 product-one">
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id, 'rent' => $v->id]) ?>">
                        <div class="item-thing">
                            <div class="item-img">
                                <img src="<?= Yii::getAlias('@thing').'/'.$v->img ?>" alt=""/>
                            </div>
                            <div class="description">
                                <?= $v->name ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else : ?>
    <div class="col-md-12">
        <p>
            По вашему запросу ничего не найдено
        </p>
    </div>
<?php endif; ?>
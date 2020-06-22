<div class="modal fade" id="thing-extend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?= $message ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/payment/balance']) ?>" class="btn btn-primary modal-btn">Списать с баланса личного кабинета</a><br />
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/payment/tinkoff']) ?>" class="btn btn-success modal-btn">Оплата картой</a><br />
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/payment/curier']) ?>" class="btn btn-default modal-btn">Оплата наличными курьеру</a>
            </div>
        </div>
    </div>
</div>

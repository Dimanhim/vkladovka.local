<?php
$this->title = $model->request ? 'Результаты поиска "'.$model->request.'"' : 'Результаты поиска';
?>
<?php if($results): ?>
<div class="row">
    <?php foreach($results as $result) : ?>
    <div class="col-md-3">
        <div class="search-result-block">
            <a href="<?= $result['link'] ?>">
                <div class="search-result-header-block">
                    Найдено в категории <b><?= $result['category'] ?></b>
                </div>
                <div class="search-result-image-block">
                    <img src="<?= $result['image'] ?>" alt="">
                </div>
                <div class="search-result-content-block">
                    <?= $result['name'] ?>
                </div>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php else : ?>
    <div class="row">
        <div class="col-md-6">
            По Вашему запросу ничего не найдено
        </div>
    </div>
<?php endif; ?>

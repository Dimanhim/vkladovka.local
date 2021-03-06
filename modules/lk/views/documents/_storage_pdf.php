<h2 style="font-size: 20px; text-align: center;">Приложение к договору № <?= $model->agreementNumber ?> от <?= date('d.m.Y', $created_at) ?></h2>
<p>Перечень вещей, переданных на хранение</p>
<?php $count = 1 ?>
<table style="width: 100%; border: 1px solid #ccc; font-size: 12px">
    <tr style="border: 1px solid #ccc">
        <th>№</th>
        <th>Название вещи</th>
        <th>Краткое описание(цвет, материал, размер, особенности</th>
        <th>Наличие визуальных дефектов (где находится, какой дефект)</th>
    </tr>
    <?php if($things) : ?>
        <?php foreach($things as $thing) : ?>
            <tr style="border: 1px solid #ccc">
                <td>1</td>
                <td><?= $thing->name ?></td>
                <td><?= $thing->rent ? $thing->rent->description : '' ?></td>
                <td><?= $thing->rent ? $thing->rent->special_conditions : '' ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<table width="100%" style="margin-top: 40px;">
    <tr>
        <td>
            <p>Исполнитель: <?= $settings->organization_name ?></p>
            <p>директор - <?= $settings->director_name ?></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>_________________</p>
        </td>
        <td style="text-aling: right">
            <p>Заказчик: <?= $user->fio ?></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p style="margin-top: 40px;">_________________</p>
        </td>
    </tr>
</table>

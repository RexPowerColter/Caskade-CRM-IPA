<?php
if (!isset($filters['month']))  $filters['month'] = date("m");
if (!isset($filters['year']))  $filters['year'] = date("Y");
?>

<div class="filters btn">
    <form method="POST" action="/Statistic/endcontract" class="statistic_buttons_flex">

        <select name="year" class="form-control statistic_buttons_small_gap">
            <?php foreach ($years as $year) : ?>
                <option value="<?= $year; ?>" <?= ($year == $filters['year']) ? 'selected' : '' ?>><?= $year; ?></option>
            <?php endforeach; ?>
        </select>

        <select name="month" class="form-control statistic_buttons_large_gap">
            <?php foreach ($months as $key => $value) : ?>
                <option value="<?= $key; ?>" <?= ($key == $filters['month']) ? 'selected' : '' ?>><?= $value; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" class="form-control" value="Suchen">
    </form>
</div>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="row">ID</th>
            <th scope="row">Name</th>
            <th scope="row">Start datum</th>
            <th scope="row">End datum</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entries as $entry) : ?>
            <tr>
                <td>
                    <?= $entry->getId(); ?>
                </td>
                <td>
                    <?= $entry->getName(); ?>
                </td>
                <td>
                    <?= $entry->getStart_date(); ?>
                </td>
                <td>
                    <?= $entry->getEnd_date(); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
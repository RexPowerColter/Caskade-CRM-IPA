<?php
    $total = 0;
?>
<div class="filters btn">
    <form method="POST" class="statistic_buttons_flex">
        <select name="year" class="form-control statistic_buttons_large_gap">
            <option>Alle Jahre Gesamt</option>
            <?php foreach ($years as $year) : ?>
                <option value="<?= $year; ?>" <?= (isset($filters['year']) && $year == $filters['year']) ? 'selected' : '' ?>><?= $year; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" class="form-control" value="Suchen">
    </form>
</div>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="row">Jahr</th>
            <th scope="row">Umsatz</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entries as $entry) : ?>
            <tr>
                <td>
                    <?= $entry['year']; ?>
                </td>
                <td>
                    <?= $entry['total']; ?>
                </td>
               
            </tr>
        <?php
            $total += $entry['total'];
        endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>
                Gesamt
            </th>
            <th>
                <?=$total;?>
            </th>
        </tr>
    </tfoot>
</table>
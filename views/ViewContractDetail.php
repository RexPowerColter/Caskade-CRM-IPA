<table class="table table-hover table-striped">
    <tbody>
        <tr>
            <th scope="row">ID</th>
            <td><?= $entry->getId() ?></td>
        </tr>
        <tr>
            <th scope="row">Name</th>
            <td><?= $entry->getName() ?></td>
        </tr>

        <?php if (count($entry->getClients()) > 0) : $count = 1; ?>



            <?php foreach ($entry->getClients() as $client) : ?>
                <tr>
                    <th>
                        Kunde <?= $count++; ?>
                    </th>
                    <td>
                        <?= $client->getFirstname(); ?> <?= $client->getLastname(); ?>
                    </td>

                </tr>

            <?php endforeach; ?>
        <?php endif; ?>

        <tr>
            <th scope="row">Start Datum</th>
            <td><?= $entry->getStart_date() ?></td>
        </tr>
        <tr>
            <th scope="row">Preis</th>
            <td><?= $entry->getFinal_price() ?></td>
        </tr>

        <?php
        if ($entry->getFile() !== "") {
        ?>

            <tr>
                <th scope="row">PDF Document</th>
                <td><a href="/uploads/<?= $entry->getFile() ?>" download="<?= $entry->getFile() ?>"><i class="fa fa-download"></i> Download PDF: <?= $entry->getFile() ?></a></td>
            </tr>

        <?php } ?>

        <tr>
            <th scope="row">Status</th>
            <td><?= $entry->getState() ?></td>
        </tr>
    </tbody>
</table>


<?php if (count($entry->getProducts()) > 0) : ?>
    <h3>Produkte</h3>
    <table class="table table-hover table-striped">
        <tbody>
            <?php foreach ($entry->getProducts() as $product) : ?>
                <tr>
                    <th>
                        ID
                    </th>
                    <td>
                        <?= $product->getId(); ?>
                    </td>

                    <th>
                        Name
                    </th>
                    <td>
                        <?= $product->getName(); ?>
                    </td>
                    <th>
                        Alter
                    </th>
                    <td>
                        <?= $product->getAge(); ?>
                    </td>
                    <th>
                        Alcohol Prozent
                    </th>
                    <td>
                        <?= $product->getAlcohol_percentage(); ?>
                    </td>
                    <th>
                        Volumen
                    </th>
                    <td>
                        <?= $product->getVolume(); ?>
                    </td>
                    <th>
                        Lagerzeit
                    </th>
                    <td>
                        <?= $product->getStorage_time(); ?>
                    </td>
                    <th>
                        Preis
                    </th>
                    <td>
                        <?= $product->getPrice(); ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>
<?php endif; ?>



<div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-secondary" onclick="history.back()">Zurück</button>
</div>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Aktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entries as $entry) : ?>
            <tr>
                <th scope="row">
                    <?= $entry->getId() ?></th>
                <td><?= $entry->getFirstname() ?></td>
                <td><?= $entry->getLastname() ?></td>
                <td>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <div class="mr-2" role="group" aria-label="Second group">
                            <a href="/Client/show/<?= $entry->getId(); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="mr-2" role="group" aria-label="Second group">
                            <a href="/Client/edit/<?= $entry->getId(); ?>" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                        </div>
                        <div class="mr-2" role="group" aria-label="Second group">
                            <a href="/Client/delete/<?= $entry->getId(); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<input type="button" class="btn btn-primary" value="Erstelle einen neuen Kunden" onclick="window.location.href='/Client/add'">
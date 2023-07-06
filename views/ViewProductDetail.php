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
        <tr>
            <th scope="row">Alter</th>
            <td><?= $entry->getAge() ?></td>
        </tr>
        <tr>
            <th scope="row">Alcohol Prozent</th>
            <td><?= $entry->getAlcohol_percentage() ?></td>
        </tr>
        <tr>
            <th scope="row">Volumen</th>
            <td><?= $entry->getVolume() ?></td>
        </tr>
        <tr>
            <th scope="row">Lagerzeit</th>
            <td><?= $entry->getStorage_time() ?></td>
        </tr>
        <tr>
            <th scope="row">Preis</th>
            <td><?= $entry->getPrice() ?></td>
        </tr>
    </tbody>
</table>
<div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-secondary" onclick="history.back()">Zurück</button>
</div>
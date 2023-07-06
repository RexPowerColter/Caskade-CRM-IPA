<table class="table table-hover table-striped">
    <tbody>
        <tr>
            <th scope="row">ID</th>
            <td><?= $entry->getId() ?></td>
        </tr>
        <tr>
            <th scope="row">Vorname</th>
            <td><?= $entry->getFirstname() ?></td>
        </tr>
        <tr>
            <th scope="row">Nachname</th>
            <td><?= $entry->getLastname() ?></td>
        </tr>
        <tr>
            <th scope="row">Geburtstag</th>
            <td><?= $entry->getBirthday() ?></td>
        </tr>
        <tr>
            <th scope="row">Nationality</th>
            <td><?= $entry->getNationality() ?></td>
        </tr>
        <tr>
            <th scope="row">Strasse</th>
            <td><?= $entry->getStreet() ?></td>
        </tr>
        <tr>
            <th scope="row">Postleitzahl</th>
            <td><?= $entry->getZipcode() ?></td>
        </tr>
        <tr>
            <th scope="row">Stadt</th>
            <td><?= $entry->getCity() ?></td>
        </tr>
        <tr>
            <th scope="row">Land</th>
            <td><?= $entry->getCountry() ?></td>
        </tr>
        <tr>
            <th scope="row">Telefonnummer</th>
            <td><?= $entry->getPhone() ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?= $entry->getEmail() ?></td>
        </tr>
        <tr>
            <th scope="row">IBAN</th>
            <td><?= $entry->getIban() ?></td>
        </tr>
        <tr>
            <th scope="row">Bank</th>
            <td><?= $entry->getBank() ?></td>
        </tr>
        <tr>
            <th scope="row">Account</th>
            <td><?= $entry->getAccount() ?></td>
        </tr>
        <tr>
            <th scope="row">Status</th>
            <td><?= $entry->getState() ?></td>
        </tr>
    </tbody>
</table>



<?php if (count($entry->getContracts()) > 0) : ?>
    <h3>Verträge</h3>
    <table class="table table-hover table-striped">
        <tbody>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
            </tr>
            <?php foreach ($entry->getContracts() as $contract) : ?>


                <tr>
                    <td>
                        <a href="/Contract/show/<?= $contract->getId() ?>">
                            <?= $contract->getId(); ?>
                        </a>
                    </td>
                    <td>
                        <a href="/Contract/show/<?= $contract->getId() ?>">
                            <?= $contract->getName(); ?>
                        </a>
                    </td>
                </tr>
                </a>

            <?php endforeach; ?>
        </tbody>

    </table>
<?php endif; ?>

<div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-secondary" onclick="history.back()">Zurück</button>
</div>
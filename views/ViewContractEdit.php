<?php
$contractClients = $entry->getClients();
?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo "Editiere Vertragdaten von: " . $name ?></h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Daten Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/Contract/edit/<?= $entry->getId() ?>" class="userentry" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">Name</label>
                    <input <?= ($validate['name']['required']) ? 'required' : '' ?> minlength="<?= $validate['name']['minLength'] ?>" maxlength="<?= $validate['name']['maxLength'] ?>" class="form-control <?= (isset($messages)) ? ((isset($messages['name'])) ? "is-invalid" : "is-valid") : "" ?>" name="name" type="<?= $validate['name']['type'] ?>" id="name" value="<?= $entry->getName() ?>">
                    <?= (isset($messages['name'])) ? "<div class='invalid-feedback'>" . $messages['name'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="name" class="required">Kunde 1</label>
                    <input value="<?= $contractClients[0]->getFirstname() . " " . $contractClients[0]->getLastname(); ?>" name="client-autocomplete" id="" class="form-control client-autocomplete" placeholder="Kunden" required>
                    <span class="client_ids">
                        <input name="clients[]" type="hidden" value="<?= $contractClients[0]->getId() ?>">
                    </span>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="name" class="required">Kunde 2</label>
                    <input value="<?= (isset($contractClients[1])) ?   $contractClients[1]->getFirstname() . " " . $contractClients[1]->getLastname() : '' ?>" name="client-autocomplete" id="" class="form-control client-autocomplete" placeholder="Kunden">
                    <span class="client_ids">
                        <?php if (isset($contractClients[1])) : ?>
                            <input name="clients[]" type="hidden" value="<?= $contractClients[1]->getId() ?>">
                        <?php endif; ?>
                    </span>
                </div>

            </div>


            <div class="form-group col-md-4">
                <label for="name" class="required">Produkte</label>
                <select name="products[]" id="" class="form-control chosen-select" placeholder="Produkte" required multiple>
                    <?php foreach ($products as $product) : ?>
                        <option <?= ($entry->checkProduct($product->getId())) ? 'selected' : '' ?> value="<?= $product->getId(); ?>"><?= $product->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="start_date">Start Datum</label>
                    <input <?= ($validate['start_date']['required']) ? 'required' : '' ?> minlength="<?= $validate['start_date']['minLength'] ?>" maxlength="<?= $validate['start_date']['maxLength'] ?>" name="start_date" class="form-control <?= (isset($messages)) ? ((isset($messages['start_date'])) ? "is-invalid" : "is-valid") : "" ?>" type="<?= $validate['start_date']['type'] ?>" id="start_date" value="<?= $entry->getStart_date() ?>">
                    <?= (isset($messages['start_date'])) ? "<div class='invalid-feedback'>" . $messages['start_date'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="end_date">End Datum</label>
                    <input <?= ($validate['end_date']['required']) ? 'required' : '' ?> minlength="<?= $validate['end_date']['minLength'] ?>" maxlength="<?= $validate['end_date']['maxLength'] ?>" name="end_date" class="form-control <?= (isset($messages)) ? ((isset($messages['start_end'])) ? "is-invalid" : "is-valid") : "" ?>" type="<?= $validate['end_date']['type'] ?>" id="end_date" value="<?= $entry->getEnd_date() ?>">
                    <?= (isset($messages['end_date'])) ? "<div class='invalid-feedback'>" . $messages['end_date'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="final_price">Finaler Preis</label>
                    <input <?= ($validate['final_price']['required']) ? 'required' : '' ?> minlength="<?= $validate['final_price']['minLength'] ?>" maxlength="<?= $validate['final_price']['maxLength'] ?>" step="0.01" class="form-control <?= (isset($messages)) ? ((isset($messages['final_price'])) ? "is-invalid" : "is-valid") : "" ?>" name="final_price" type="<?= $validate['final_price']['type'] ?>" id="final_price" value="<?= $entry->getFinal_price() ?>">
                    <?= (isset($messages['final_price'])) ? "<div class='invalid-feedback'>" . $messages['final_price'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-2">
                    <label for="replaceFile">Ersetze die PDF Datei</label>
                    <input minlength="<?= $validate['file']['minLength'] ?>" maxlength="<?= $validate['file']['maxLength'] ?>" name="file" type="<?= $validate['file']['type'] ?>" class="form-control-file <?= (isset($messages)) ? ((isset($messages['file'])) ? "is-invalid" : "is-valid") : "" ?>" id="replaceFile" value="<?= $entry->getFile() ?>" accept="application/pdf,application/vnd.ms-excel">
                    <?= (isset($messages['file'])) ? "<div class='invalid-feedback'>" . $messages['file'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>

                <?php
                if ($entry->getFile() !== "") {
                ?>

                    <div class="form-group col-md-4">
                        <label for="currentFile">PDF Datei Download</label>
                        <a class="form-control" id="currentFile" href="/uploads/<?= $entry->getFile() ?>" download="<?= $entry->getFile() ?>"><i class="fa fa-download"></i> <?= $entry->getFile() ?></a>
                    </div>

                <?php } ?>

                <div class="form-group col-md-3">
                    <label for="state">Vertragstatus (Aktiv oder Deaktiviert)</label>
                    <input name="state" class="form-control" type="checkbox" id="state" value="1" <?= $entry->getState() ? 'checked' : ''; ?>>
                </div>
            </div>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Zurück</button>
                </div>
            </div>
        </form>
    </div>
</div>
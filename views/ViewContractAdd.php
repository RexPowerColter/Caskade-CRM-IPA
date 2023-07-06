<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Erstelle einen neuen Vertrag</h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Vertrag Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/Contract/add" class="contractentry" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name" class="required">Name</label>
                    <input <?= ($validate['name']['required']) ? 'required' : '' ?> minlength="<?= $validate['name']['minLength'] ?>" maxlength="<?= $validate['name']['maxLength'] ?>" type="<?= $validate['name']['type'] ?>" name="name" class="form-control <?= (isset($messages)) ? ((isset($messages['name'])) ? "is-invalid" : "is-valid") : "" ?>" id="name" placeholder="Name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>">
                    <?= (isset($messages['name'])) ? "<div class='invalid-feedback'>" . $messages['name'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name" class="required">Kunde 1</label>
                    <input name="client-autocomplete" id="" class="form-control client-autocomplete" placeholder="Kunden" required>
                    <span class="client_ids"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">Kunde 2</label>
                    <input name="client-autocomplete" id="" class="form-control client-autocomplete" placeholder="Kunden">
                    <span class="client_ids"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name" class="required">Produkte</label>
                    <select name="products[]" id="" class="form-control chosen-select" placeholder="Produkte" required multiple>
                        <?php foreach ($products as $product) : ?>
                            <option value="<?= $product->getId(); ?>"><?= $product->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="start_date" class="required">Start Datum</label>
                    <input <?= ($validate['start_date']['required']) ? 'required' : '' ?> minlength="<?= $validate['start_date']['minLength'] ?>" maxlength="<?= $validate['start_date']['maxLength'] ?>" type="<?= $validate['start_date']['type'] ?>" name="start_date" class="form-control <?= (isset($messages)) ? ((isset($messages['start_date'])) ? "is-invalid" : "is-valid") : "" ?>" id="start_date" placeholder="Start Datum" value="<?= (isset($_POST['start_date'])) ? $_POST['start_date'] : '' ?>">
                    <?= (isset($messages['start_date'])) ? "<div class='invalid-feedback'>" . $messages['start_date'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="end_date" class="required">End Datum</label>
                    <input <?= ($validate['end_date']['required']) ? 'required' : '' ?> minlength="<?= $validate['end_date']['minLength'] ?>" maxlength="<?= $validate['end_date']['maxLength'] ?>" type="<?= $validate['end_date']['type'] ?>" name="end_date" class="form-control <?= (isset($messages)) ? ((isset($messages['end_date'])) ? "is-invalid" : "is-valid") : "" ?>" id="end_date" placeholder="end_date" value="<?= (isset($_POST['end_date'])) ? $_POST['end_date'] : '' ?>">
                    <?= (isset($messages['end_date'])) ? "<div class='invalid-feedback'>" . $messages['end_date'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="final_price" class="required">Finaler Preis</label>
                    <input <?= ($validate['final_price']['required']) ? 'required' : '' ?> minlength="<?= $validate['final_price']['minLength'] ?>" maxlength="<?= $validate['final_price']['maxLength'] ?>" step="0.01" type="<?= $validate['final_price']['type'] ?>" name="final_price" class="form-control <?= (isset($messages)) ? ((isset($messages['final_price'])) ? "is-invalid" : "is-valid") : "" ?>" id="final_price" placeholder="Finaler Preis" value="<?= (isset($_POST['final_price'])) ? $_POST['final_price'] : '' ?>">
                    <?= (isset($messages['final_price'])) ? "<div class='invalid-feedback'>" . $messages['final_price'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="file">Wähle eine Datei</label>
                    <input <?= ($validate['file']['required']) ? 'required' : '' ?> type="<?= $validate['file']['type'] ?>" name="file" class="form-control-file <?= (isset($messages)) ? ((isset($messages['file'])) ? "is-invalid" : "is-valid") : "" ?>" id="file" accept="application/pdf,application/vnd.ms-excel">
                    <?= (isset($messages['file'])) ? "<div class='invalid-feedback'>" . $messages['file'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="state">Vertragstatus (Aktiv oder Deaktiviert)</label>
                    <input name="state" type="checkbox" value="1" class="form-control" id="state">
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
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Erstelle einen neuen Produkt</h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Produkt Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/Product/add" class="contractentry">
            <div class="form-column">
                <div class="form-group col-md-4">
                    <label for="name" class="required">Name</label>
                    <input <?= ($validate['name']['required']) ? 'required' : '' ?> minlength="<?= $validate['name']['minLength'] ?>" maxlength="<?= $validate['name']['maxLength'] ?>" type="<?= $validate['name']['type'] ?>" name="name" class="form-control <?= (isset($messages)) ? ((isset($messages['name'])) ? "is-invalid" : "is-valid") : "" ?>" id="name" placeholder="Name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>">
                    <?= (isset($messages['name'])) ? "<div class='invalid-feedback'>" . $messages['name'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="age" class="required">Alter</label>
                    <input <?= ($validate['age']['required']) ? 'required' : '' ?> minlength="<?= $validate['age']['minLength'] ?>" maxlength="<?= $validate['age']['maxLength'] ?>" type="<?= $validate['age']['type'] ?>" name="age" class="form-control <?= (isset($messages)) ? ((isset($messages['age'])) ? "is-invalid" : "is-valid") : "" ?>" id="age" placeholder="Alter" value="<?= (isset($_POST['age'])) ? $_POST['age'] : '' ?>">
                    <?= (isset($messages['age'])) ? "<div class='invalid-feedback'>" . $messages['age'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="alcohol_percentage" class="required">Alkohol Prozent</label>
                    <input <?= ($validate['alcohol_percentage']['required']) ? 'required' : '' ?> minlength="<?= $validate['alcohol_percentage']['minLength'] ?>" maxlength="<?= $validate['alcohol_percentage']['maxLength'] ?>" type="<?= $validate['alcohol_percentage']['type'] ?>" name="alcohol_percentage" class="form-control <?= (isset($messages)) ? ((isset($messages['alcohol_percentage'])) ? "is-invalid" : "is-valid") : "" ?>" id="alcohol_percentage" placeholder="Alkohol Prozent" value="<?= (isset($_POST['alcohol_percentage'])) ? $_POST['alcohol_percentage'] : '' ?>">
                    <?= (isset($messages['alcohol_percentage'])) ? "<div class='invalid-feedback'>" . $messages['alcohol_percentage'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="volume" class="required">Volumen</label>
                    <input <?= ($validate['volume']['required']) ? 'required' : '' ?> minlength="<?= $validate['volume']['minLength'] ?>" maxlength="<?= $validate['volume']['maxLength'] ?>" type="<?= $validate['volume']['type'] ?>" name="volume" class="form-control <?= (isset($messages)) ? ((isset($messages['volume'])) ? "is-invalid" : "is-valid") : "" ?>" id="volume" placeholder="Volumen" value="<?= (isset($_POST['volume'])) ? $_POST['volume'] : '' ?>">
                    <?= (isset($messages['volume'])) ? "<div class='invalid-feedback'>" . $messages['volume'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="storage_time" class="required">Lagerzeit</label>
                    <input <?= ($validate['storage_time']['required']) ? 'required' : '' ?> minlength="<?= $validate['storage_time']['minLength'] ?>" maxlength="<?= $validate['storage_time']['maxLength'] ?>" type="<?= $validate['storage_time']['type'] ?>" name="storage_time" class="form-control <?= (isset($messages)) ? ((isset($messages['storage_time'])) ? "is-invalid" : "is-valid") : "" ?>" id="storage_time" placeholder="Lagerzeit" value="<?= (isset($_POST['storage_time'])) ? $_POST['storage_time'] : '' ?>">
                    <?= (isset($messages['storage_time'])) ? "<div class='invalid-feedback'>" . $messages['storage_time'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="price" class="required">Preis</label>
                    <input <?= ($validate['price']['required']) ? 'required' : '' ?> minlength="<?= $validate['price']['minLength'] ?>" maxlength="<?= $validate['price']['maxLength'] ?>" step="0.01" type="<?= $validate['price']['type'] ?>" name="price" class="form-control <?= (isset($messages)) ? ((isset($messages['price'])) ? "is-invalid" : "is-valid") : "" ?>" id="price" placeholder="Preis" value="<?= (isset($_POST['price'])) ? $_POST['price'] : '' ?>">
                    <?= (isset($messages['price'])) ? "<div class='invalid-feedback'>" . $messages['price'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
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
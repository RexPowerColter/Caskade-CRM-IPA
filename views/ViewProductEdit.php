<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo "Editiere Produktdaten von: " . $name ?></h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Daten Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/Product/edit/<?= $entry->getId() ?>" class="userentry" enctype="multipart/form-data">
            <div class="form-column">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input <?= ($validate['name']['required']) ? 'required' : '' ?> minlength="<?= $validate['name']['minLength'] ?>" maxlength="<?= $validate['name']['maxLength'] ?>" class="form-control" name="name" type="" id="name" value="<?= $entry->getName() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="age">Alter</label>
                    <input <?= ($validate['age']['required']) ? 'required' : '' ?> minlength="<?= $validate['age']['minLength'] ?>" maxlength="<?= $validate['age']['maxLength'] ?>" name="age" class="form-control" type="" id="age" value="<?= $entry->getAge() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="alcohol_percentage">Alkohol Prozent</label>
                    <input <?= ($validate['alcohol_percentage']['required']) ? 'required' : '' ?> minlength="<?= $validate['alcohol_percentage']['minLength'] ?>" maxlength="<?= $validate['alcohol_percentage']['maxLength'] ?>" name="alcohol_percentage" class="form-control" type="" id="alcohol_percentage" value="<?= $entry->getAlcohol_percentage() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="volume">Volumen</label>
                    <input <?= ($validate['volume']['required']) ? 'required' : '' ?> minlength="<?= $validate['volume']['minLength'] ?>" maxlength="<?= $validate['volume']['maxLength'] ?>" class="form-control" name="volume" type="" id="volume" value="<?= $entry->getVolume() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="storage_time">Lagerzeit</label>
                    <input <?= ($validate['storage_time']['required']) ? 'required' : '' ?> minlength="<?= $validate['storage_time']['minLength'] ?>" maxlength="<?= $validate['storage_time']['maxLength'] ?>" name="storage_time" class="form-control" type="" id="storage_time" value="<?= $entry->getStorage_time() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="price">Preis</label>
                    <input <?= ($validate['price']['required']) ? 'required' : '' ?> minlength="<?= $validate['price']['minLength'] ?>" maxlength="<?= $validate['price']['maxLength'] ?>" step="0.01" name="price" class="form-control" type="number" id="price" value="<?= $entry->getPrice() ?>">
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
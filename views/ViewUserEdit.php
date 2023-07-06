<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo "Editiere Benutzerdaten von: " . $entry->getUsername() ?></h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Daten Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/User/edit/<?= $entry->getId() ?>" class="userentry">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username">Benutzername</label>
                    <input minlength="<?= $validate['username']['minLength'] ?>" maxlength="<?= $validate['username']['maxLength'] ?>" type="<?= $validate['username']['type'] ?>" name="username" class="form-control <?= (isset($messages)) ? ((isset($messages['username'])) ? "is-invalid" : "is-valid") : "" ?>" id="username" placeholder="Benutzername" value="<?= $entry->getUsername(); ?>">
                    <?= (isset($messages['username'])) ? "<div class='invalid-feedback'>" . $messages['username'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Passwort</label>
                    <input minlength="<?= $validate['password']['minLength'] ?>" maxlength="<?= $validate['password']['maxLength'] ?>" type="<?= $validate['password']['type'] ?>" name="password" class="form-control <?= (isset($messages)) ? ((isset($messages['password'])) ? "is-invalid" : "is-valid") : "" ?>" id="password" placeholder="Passwort">
                    <?= (isset($messages['password'])) ? "<div class='invalid-feedback'>" . $messages['password'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
            </div>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Zurück</button>
                </div>
                <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
        </form>
    </div>
</div>
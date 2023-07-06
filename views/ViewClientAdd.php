<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Erstelle einen neuen Kunden</h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Kunden Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/Client/add" class="cliententry">
            <div class="form-column">
                <div class="form-group col-md-3">
                    <label for="title" class="required">Titel</label>
                    <input <?= ($validate['title']['required']) ? 'required' : '' ?> minlength="<?= $validate['title']['minLength'] ?>" maxlength="<?= $validate['title']['maxLength'] ?>" type="<?= $validate['title']['type'] ?>" name="title" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['title'])) ? "is-invalid" : "is-valid") : "" ?>" id="title" placeholder="Title" value="<?= (isset($_POST['title'])) ? $_POST['title'] : '' ?>">
                    <?= (isset($messages['title'])) ? "<div class='invalid-feedback'>" . $messages['title'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="firstname" class="required">Vorname</label>
                    <input <?= ($validate['firstname']['required']) ? 'required' : '' ?> minlength="<?= $validate['firstname']['minLength'] ?>" maxlength="<?= $validate['firstname']['maxLength'] ?>" type="<?= $validate['firstname']['type'] ?>" name="firstname" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['firstname'])) ? "is-invalid" : "is-valid") : "" ?>" id="firstname" placeholder="Vorname" value="<?= (isset($_POST['firstname'])) ? $_POST['firstname'] : '' ?>">
                    <?= (isset($messages['firstname'])) ? "<div class='invalid-feedback'>" . $messages['firstname'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="lastname" class="required">Nachname</label>
                    <input <?= ($validate['lastname']['required']) ? 'required' : '' ?> minlength="<?= $validate['lastname']['minLength'] ?>" maxlength="<?= $validate['lastname']['maxLength'] ?>" type="<?= $validate['lastname']['type'] ?>" name="lastname" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['lastname'])) ? "is-invalid" : "is-valid") : "" ?>" id="lastname" placeholder="Nachname" value="<?= (isset($_POST['lastname'])) ? $_POST['lastname'] : '' ?>">
                    <?= (isset($messages['lastname'])) ? "<div class='invalid-feedback'>" . $messages['lastname'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="birthday" class="required">Geburtstag</label>
                    <input <?= ($validate['birthday']['required']) ? 'required' : '' ?> minlength="<?= $validate['birthday']['minLength'] ?>" maxlength="<?= $validate['birthday']['maxLength'] ?>" type="<?= $validate['birthday']['type'] ?>" name="birthday" type="date" class="form-control <?= (isset($messages)) ? ((isset($messages['birthday'])) ? "is-invalid" : "is-valid") : "" ?>" id="birthday" placeholder="Geburtstag" value="<?= (isset($_POST['birthday'])) ? $_POST['birthday'] : '' ?>">
                    <?= (isset($messages['birthday'])) ? "<div class='invalid-feedback'>" . $messages['birthday'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="nationality" class="required">Nationalität</label>
                    <input <?= ($validate['nationality']['required']) ? 'required' : '' ?> minlength="<?= $validate['nationality']['minLength'] ?>" maxlength="<?= $validate['nationality']['maxLength'] ?>" type="<?= $validate['nationality']['type'] ?>" name="nationality" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['nationality'])) ? "is-invalid" : "is-valid") : "" ?>" id="nationality" placeholder="Nationalität" value="<?= (isset($_POST['nationality'])) ? $_POST['nationality'] : '' ?>">
                    <?= (isset($messages['nationality'])) ? "<div class='invalid-feedback'>" . $messages['nationality'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="street" class="required">Strasse</label>
                    <input <?= ($validate['street']['required']) ? 'required' : '' ?> minlength="<?= $validate['street']['minLength'] ?>" maxlength="<?= $validate['street']['maxLength'] ?>" type="<?= $validate['street']['type'] ?>" name="street" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['street'])) ? "is-invalid" : "is-valid") : "" ?>" id="street" placeholder="Strasse" value="<?= (isset($_POST['street'])) ? $_POST['street'] : '' ?>">
                    <?= (isset($messages['street'])) ? "<div class='invalid-feedback'>" . $messages['street'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="zipcode" class="required">Postleitzahl</label>
                    <input <?= ($validate['zipcode']['required']) ? 'required' : '' ?> minlength="<?= $validate['zipcode']['minLength'] ?>" maxlength="<?= $validate['zipcode']['maxLength'] ?>" type="<?= $validate['zipcode']['type'] ?>" name="zipcode" type="number" class="form-control <?= (isset($messages)) ? ((isset($messages['zipcode'])) ? "is-invalid" : "is-valid") : "" ?>" id="zipcode" placeholder="Postleitzahl" value="<?= (isset($_POST['zipcode'])) ? $_POST['zipcode'] : '' ?>">
                    <?= (isset($messages['zipcode'])) ? "<div class='invalid-feedback'>" . $messages['zipcode'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="city" class="required">Stadt</label>
                    <input <?= ($validate['city']['required']) ? 'required' : '' ?> minlength="<?= $validate['city']['minLength'] ?>" maxlength="<?= $validate['city']['maxLength'] ?>" type="<?= $validate['city']['type'] ?>" name="city" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['city'])) ? "is-invalid" : "is-valid") : "" ?>" id="city" placeholder="Stadt" value="<?= (isset($_POST['city'])) ? $_POST['city'] : '' ?>">
                    <?= (isset($messages['city'])) ? "<div class='invalid-feedback'>" . $messages['city'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="country" class="required">Land</label>
                    <input <?= ($validate['country']['required']) ? 'required' : '' ?> minlength="<?= $validate['country']['minLength'] ?>" maxlength="<?= $validate['country']['maxLength'] ?>" type="<?= $validate['country']['type'] ?>" name="country" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['country'])) ? "is-invalid" : "is-valid") : "" ?>" id="country" placeholder="Land" value="<?= (isset($_POST['country'])) ? $_POST['country'] : '' ?>">
                    <?= (isset($messages['country'])) ? "<div class='invalid-feedback'>" . $messages['country'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="phone" class="required">Telefonnummer</label>
                    <input <?= ($validate['phone']['required']) ? 'required' : '' ?> minlength="<?= $validate['phone']['minLength'] ?>" maxlength="<?= $validate['phone']['maxLength'] ?>" type="<?= $validate['phone']['type'] ?>" name="phone" type="number" class="form-control <?= (isset($messages)) ? ((isset($messages['phone'])) ? "is-invalid" : "is-valid") : "" ?>" id="phone" placeholder="Telefonnummer" value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : '' ?>">
                    <?= (isset($messages['phone'])) ? "<div class='invalid-feedback'>" . $messages['phone'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="email" class="required">Email</label>
                    <input <?= ($validate['email']['required']) ? 'required' : '' ?> minlength="<?= $validate['email']['minLength'] ?>" maxlength="<?= $validate['email']['maxLength'] ?>" type="<?= $validate['email']['type'] ?>" name="email" type="email" class="form-control <?= (isset($messages)) ? ((isset($messages['email'])) ? "is-invalid" : "is-valid") : "" ?>" id="email" placeholder="Email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
                    <?= (isset($messages['email'])) ? "<div class='invalid-feedback'>" . $messages['email'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="iban" class="required">IBAN</label>
                    <input <?= ($validate['iban']['required']) ? 'required' : '' ?> minlength="<?= $validate['iban']['minLength'] ?>" maxlength="<?= $validate['iban']['maxLength'] ?>" type="<?= $validate['iban']['type'] ?>" name="iban" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['iban'])) ? "is-invalid" : "is-valid") : "" ?>" id="iban" placeholder="IBAN" value="<?= (isset($_POST['iban'])) ? $_POST['iban'] : '' ?>">
                    <?= (isset($messages['iban'])) ? "<div class='invalid-feedback'>" . $messages['iban'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="bank" class="required">Bank</label>
                    <input <?= ($validate['bank']['required']) ? 'required' : '' ?> minlength="<?= $validate['bank']['minLength'] ?>" maxlength="<?= $validate['bank']['maxLength'] ?>" type="<?= $validate['bank']['type'] ?>" name="bank" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['bank'])) ? "is-invalid" : "is-valid") : "" ?>" id="bank" placeholder="Bank" value="<?= (isset($_POST['bank'])) ? $_POST['bank'] : '' ?>">
                    <?= (isset($messages['bank'])) ? "<div class='invalid-feedback'>" . $messages['bank'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="account" class="required">Account</label>
                    <input <?= ($validate['account']['required']) ? 'required' : '' ?> minlength="<?= $validate['account']['minLength'] ?>" maxlength="<?= $validate['account']['maxLength'] ?>" type="<?= $validate['account']['type'] ?>" name="account" type="text" class="form-control <?= (isset($messages)) ? ((isset($messages['account'])) ? "is-invalid" : "is-valid") : "" ?>" id="account" placeholder="Account" value="<?= (isset($_POST['account'])) ? $_POST['account'] : '' ?>">
                    <?= (isset($messages['account'])) ? "<div class='invalid-feedback'>" . $messages['account'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="state" >Status</label>
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
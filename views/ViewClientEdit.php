<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo "Editiere Kundendaten von: " . $name ?></h3>
        <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="badge badge-primary">Daten Editieren</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="/Client/edit/<?= $entry->getId() ?>" class="userentry" enctype="multipart/form-data">
            <div class="form-column">
                <div class="form-group col-md-4">
                    <label for="title">Title</label>
                    <input <?= ($validate['title']['required']) ? 'required' : '' ?> minlength="<?= $validate['title']['minLength'] ?>" maxlength="<?= $validate['title']['maxLength'] ?>" type="<?= $validate['title']['type'] ?>" class="form-control <?= (isset($messages)) ? ((isset($messages['title'])) ? "is-invalid" : "is-valid") : "" ?>" name="title" id="title" value="<?= $entry->getTitle() ?>">
                    <?= (isset($messages['title'])) ? "<div class='invalid-feedback'>" . $messages['title'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="firstname">Vorname</label>
                    <input <?= ($validate['firstname']['required']) ? 'required' : '' ?> minlength="<?= $validate['firstname']['minLength'] ?>" maxlength="<?= $validate['firstname']['maxLength'] ?>" type="<?= $validate['firstname']['type'] ?>" name="firstname" class="form-control <?= (isset($messages)) ? ((isset($messages['firstname'])) ? "is-invalid" : "is-valid") : "" ?>" id="firstname" value="<?= $entry->getFirstname() ?>">
                    <?= (isset($messages['firstname'])) ? "<div class='invalid-feedback'>" . $messages['firstname'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="lastname" >Nachname</label>
                    <input <?= ($validate['lastname']['required']) ? 'required' : '' ?> minlength="<?= $validate['lastname']['minLength'] ?>" maxlength="<?= $validate['lastname']['maxLength'] ?>" type="<?= $validate['lastname']['type'] ?>" name="lastname" class="form-control <?= (isset($messages)) ? ((isset($messages['lastname'])) ? "is-invalid" : "is-valid") : "" ?>" id="lastname" value="<?= $entry->getLastname() ?>">
                    <?= (isset($messages['lastname'])) ? "<div class='invalid-feedback'>" . $messages['lastname'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="birthday" >Geburtstag</label>
                    <input <?= ($validate['birthday']['required']) ? 'required' : '' ?> minlength="<?= $validate['birthday']['minLength'] ?>" maxlength="<?= $validate['birthday']['maxLength'] ?>" type="<?= $validate['birthday']['type'] ?>" class="form-control <?= (isset($messages)) ? ((isset($messages['birthday'])) ? "is-invalid" : "is-valid") : "" ?>" name="birthday" id="birthday" value="<?= $entry->getBirthday() ?>">
                    <?= (isset($messages['birthday'])) ? "<div class='invalid-feedback'>" . $messages['birthday'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="nationality" >Nationalität</label>
                    <input <?= ($validate['nationality']['required']) ? 'required' : '' ?> minlength="<?= $validate['nationality']['minLength'] ?>" maxlength="<?= $validate['nationality']['maxLength'] ?>" type="<?= $validate['nationality']['type'] ?>" name="nationality" class="form-control <?= (isset($messages)) ? ((isset($messages['nationality'])) ? "is-invalid" : "is-valid") : "" ?>" id="nationality" value="<?= $entry->getNationality() ?>">
                    <?= (isset($messages['nationality'])) ? "<div class='invalid-feedback'>" . $messages['nationality'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="street" >Strasse</label>
                    <input <?= ($validate['street']['required']) ? 'required' : '' ?> minlength="<?= $validate['street']['minLength'] ?>" maxlength="<?= $validate['street']['maxLength'] ?>" type="<?= $validate['street']['type'] ?>" name="street" class="form-control <?= (isset($messages)) ? ((isset($messages['street'])) ? "is-invalid" : "is-valid") : "" ?>" id="street" value="<?= $entry->getStreet() ?>">
                    <?= (isset($messages['street'])) ? "<div class='invalid-feedback'>" . $messages['street'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="zipcode" >Postleitzahl</label>
                    <input <?= ($validate['zipcode']['required']) ? 'required' : '' ?> minlength="<?= $validate['zipcode']['minLength'] ?>" maxlength="<?= $validate['zipcode']['maxLength'] ?>" type="<?= $validate['zipcode']['type'] ?>" name="zipcode" class="form-control <?= (isset($messages)) ? ((isset($messages['zipcode'])) ? "is-invalid" : "is-valid") : "" ?>" id="zipcode" value="<?= $entry->getZipcode() ?>">
                    <?= (isset($messages['zipcode'])) ? "<div class='invalid-feedback'>" . $messages['zipcode'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="city" >Stadt</label>
                    <input <?= ($validate['city']['required']) ? 'required' : '' ?> minlength="<?= $validate['city']['minLength'] ?>" maxlength="<?= $validate['city']['maxLength'] ?>" type="<?= $validate['city']['type'] ?>" name="city" class="form-control <?= (isset($messages)) ? ((isset($messages['city'])) ? "is-invalid" : "is-valid") : "" ?>" id="city" value="<?= $entry->getCity() ?>">
                    <?= (isset($messages['city'])) ? "<div class='invalid-feedback'>" . $messages['city'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="country" >Land</label>
                    <input <?= ($validate['country']['required']) ? 'required' : '' ?> minlength="<?= $validate['country']['minLength'] ?>" maxlength="<?= $validate['country']['maxLength'] ?>" type="<?= $validate['country']['type'] ?>" name="country" class="form-control <?= (isset($messages)) ? ((isset($messages['country'])) ? "is-invalid" : "is-valid") : "" ?>" id="country" value="<?= $entry->getCountry() ?>">
                    <?= (isset($messages['country'])) ? "<div class='invalid-feedback'>" . $messages['country'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone" >Telefonnummer</label>
                    <input <?= ($validate['phone']['required']) ? 'required' : '' ?> minlength="<?= $validate['phone']['minLength'] ?>" maxlength="<?= $validate['phone']['maxLength'] ?>" type="<?= $validate['phone']['type'] ?>" name="phone" class="form-control <?= (isset($messages)) ? ((isset($messages['phone'])) ? "is-invalid" : "is-valid") : "" ?>" id="phone" value="<?= $entry->getPhone() ?>">
                    <?= (isset($messages['phone'])) ? "<div class='invalid-feedback'>" . $messages['phone'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="email" >Email</label>
                    <input <?= ($validate['email']['required']) ? 'required' : '' ?> minlength="<?= $validate['email']['minLength'] ?>" maxlength="<?= $validate['email']['maxLength'] ?>" type="<?= $validate['email']['type'] ?>" name="email" class="form-control <?= (isset($messages)) ? ((isset($messages['email'])) ? "is-invalid" : "is-valid") : "" ?>" id="email" value="<?= $entry->getEmail() ?>">
                    <?= (isset($messages['email'])) ? "<div class='invalid-feedback'>" . $messages['email'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="iban" >IBAN</label>
                    <input <?= ($validate['iban']['required']) ? 'required' : '' ?> minlength="<?= $validate['iban']['minLength'] ?>" maxlength="<?= $validate['iban']['maxLength'] ?>" type="<?= $validate['iban']['type'] ?>" name="iban" class="form-control <?= (isset($messages)) ? ((isset($messages['iban'])) ? "is-invalid" : "is-valid") : "" ?>" id="iban" value="<?= $entry->getIban() ?>">
                    <?= (isset($messages['iban'])) ? "<div class='invalid-feedback'>" . $messages['iban'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="bank" >Bank</label>
                    <input <?= ($validate['bank']['required']) ? 'required' : '' ?> minlength="<?= $validate['bank']['minLength'] ?>" maxlength="<?= $validate['bank']['maxLength'] ?>" type="<?= $validate['bank']['type'] ?>" name="bank" class="form-control <?= (isset($messages)) ? ((isset($messages['bank'])) ? "is-invalid" : "is-valid") : "" ?>" id="bank" value="<?= $entry->getBank() ?>">
                    <?= (isset($messages['bank'])) ? "<div class='invalid-feedback'>" . $messages['bank'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="account" >Account</label>
                    <input <?= ($validate['account']['required']) ? 'required' : '' ?> minlength="<?= $validate['account']['minLength'] ?>" maxlength="<?= $validate['account']['maxLength'] ?>" type="<?= $validate['account']['type'] ?>" name="account" class="form-control <?= (isset($messages)) ? ((isset($messages['account'])) ? "is-invalid" : "is-valid") : "" ?>" id="account" value="<?= $entry->getAccount() ?>">
                    <?= (isset($messages['account'])) ? "<div class='invalid-feedback'>" . $messages['account'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">Status</label>
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
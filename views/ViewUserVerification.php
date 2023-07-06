<p class="login-box-msg">Gib ein neues Passwort ein</p>
<form id="user_verification" action="/User/verification/" method="post">
    <div class="input-group mb-3">
        <input <?= ($validate['password']['required']) ? 'required' : '' ?> minlength="<?= $validate['password']['minLength'] ?>" maxlength="<?= $validate['password']['maxLength'] ?>" type="<?= $validate['password']['type'] ?>" name="password" class="form-control ui-autocomplete-input" placeholder="Neues Passwort" autocomplete="off">
        <?= (isset($messages['password'])) ? "<div class='invalid-feedback'>" . $messages['password'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input <?= ($validate['password_repeat']['required']) ? 'required' : '' ?> minlength="<?= $validate['password_repeat']['minLength'] ?>" maxlength="<?= $validate['password_repeat']['maxLength'] ?>" type="<?= $validate['password_repeat']['type'] ?>" name="password_repeat" class="form-control ui-autocomplete-input" placeholder="Neues Passwort wiederholen" autocomplete="off">
        <?= (isset($messages['password_repeat'])) ? "<div class='invalid-feedback'>" . $messages['password_repeat'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button type="submit" name="send" class="btn btn-primary btn-block">Ändern</button>
        </div>
    </div>
    <input type="hidden" name="token" value="<?= $token; ?>">
</form>
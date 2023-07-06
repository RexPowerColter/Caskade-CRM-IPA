<p class="login-box-msg">Melde dich an um deine Session zu beginnen</p>
<form id="user_login" action="/User/login/" method="post">
    <div class="input-group mb-3">
        <input <?= ($validate['username']['required']) ? 'required' : '' ?> minlength="<?= $validate['username']['minLength'] ?>" maxlength="<?= $validate['username']['maxLength'] ?>" type="<?= $validate['username']['type'] ?>" name="username" class="form-control ui-autocomplete-input" placeholder="Email" autocomplete="off" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" name="username">
        <?= (isset($messages['username'])) ? "<div class='invalid-feedback'>" . $messages['username'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input <?= ($validate['password']['required']) ? 'required' : '' ?> minlength="<?= $validate['password']['minLength'] ?>" maxlength="<?= $validate['password']['maxLength'] ?>" type="<?= $validate['password']['type'] ?>" name="password" class="form-control" placeholder="Passwort" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
        <?= (isset($messages['password'])) ? "<div class='invalid-feedback'>" . $messages['password'] . "</div>" : "<div class='valid-feedback'>Sieht gut aus!</div>" ?>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button type="submit" name="send" class="btn btn-primary btn-block">Anmelden</button>
        </div>
    </div>
</form>
<p class="mb-1">
    <a href="/User/reset">Ich habe mein Passwort vergessen...</a>
</p>
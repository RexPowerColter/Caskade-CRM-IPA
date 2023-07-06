<p class="login-box-msg">Gib dein Benutzername ein um dein Passwort zurückzusetzen</p>
<form id="user_reset" action="/User/reset/" method="post">
    <div class="input-group mb-3">
        <input required type="email" name="username" class="form-control ui-autocomplete-input" placeholder="Email" autocomplete="off" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button type="submit" name="send" class="btn btn-primary btn-block">Abschicken</button>
        </div>
    </div>
</form>
<p class="mb-1">
    <button type="button" class="btn btn-secondary" onclick="history.back()">Zurück</button>
</p>
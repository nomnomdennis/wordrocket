<?php require '../templates/header.php'; ?>


<?php if (isset($info["message"])): ?>
<div data-alert class="alert-box warning radius">
    <div class="center">
        <strong>Error</strong> <br> <?= htmlspecialchars($info["message"]) ?>
    </div>
    <a href="#" class="close">x</a>
</div>
<?php endif ?>

<div class="container">
    <h2>Register</h2>
</div>

<div class="container">
    <form data-abide action="register.php" method="post">
        <fieldset>
            <div class="large-offset-4 large-4 columns">
                <div class="form-group">
                    <label for="username">Username
                        <small>required</small>
                    </label>
                    <input type="text" placeholder="Username" name="username" required>
                    <small class="error">Required</small>
                </div>
                <div class="form-group">
                    <label for="password">Password
                        <small>required</small>
                    </label>
                    <input type="password" id="password" placeholder="Password" name="password" required>
                    <small class="error">Passwords must be at least 8 characters with 1 capital letter, 1 number, and one special character.</small>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password
                        <small>required</small>
                    </label>
                    <input type="password" id="confirmPassword" placeholder="Re-enter Paswword" name="confirmPassword" required data-equal="password">
                    <small class="error" data-error-message>Passwords must match.</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="button">Register</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<?php require '../templates/footer.php'; ?>
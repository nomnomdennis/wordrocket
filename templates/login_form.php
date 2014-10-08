<?php require '../templates/header.php'; ?>

<?php if (isset($info["message"])): ?>
<div data-alert class="alert-box warning radius">
    <div class="center">
        <strong>Error</strong> <br> <?= htmlspecialchars($info["message"]) ?>
    </div>
    <a href="#" class="close">x</a>
</div>
<?php endif ?>

<?php if (isset($_GET["i"]) && $_GET["i"] == "LOG_IN_YOU_FOOL"): ?>
<div data-alert class="alert-box warning radius">
    <div class="center">
        <strong>You need to Log In or Register!</strong> 
    </div>
    <a href="#" class="close">&times;</a>
</div>
<?php endif ?>

<div class="container">
    <h2> Log In </h2>
</div>

<div class="container">
    <form action="login.php" method="post">
        <fieldset>
            <div class="large-offset-4 large-4 columns">
                <div class="form-group">
                    <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="button">Log In</button>
                </div>
            </div>    
        </fieldset>
    </form>
</div>    

<?php require '../templates/footer.php'; ?>
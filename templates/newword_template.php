<?php require '../templates/header.php'; ?>

<?php if (isset($_GET["t"]) && $_GET["t"] == "repeatalert"): ?>
<div data-alert class="alert-box warning radius">
    <div class="center">
        <strong>Words already on the list!</strong> 
    </div>
    <a href="#" class="close">&times;</a>
</div>
<?php endif ?>

<?php if (isset($_GET["t"]) && $_GET["t"] == "success"): ?>
<div data-alert class="alert-box success radius">
    <div class="center">
        <strong>Your word has been entered! Enter another?</strong> 
    </div>
    <a href="#" class="close">&times;</a>
</div>
<?php endif ?>

<?php if (isset($_GET["t"]) && $_GET["t"] == "inappropriate"): ?>
<div data-alert class="alert-box warning radius">
    <div class="center">
        <strong>Noninspirational Inappropriate Word.</strong> 
    </div>
    <a href="#" class="close">&times;</a>
</div>
<?php endif ?>

<div class="center">
    <h1>Have a word suggestion?</h1>
    <hr>
    <form data-abide action="newword.php" method="post" class=" large-offset-4 large-4 columns" >
            <div>    
                <div class="form-group">
                    <input autofocus class="form-control" name="word" placeholder="New Word?" type="text" required>
                    <small class="error">You need to enter a word.</small>
                </div>
                <div class="form-group center">
                    <button class="right button" type="submit">Submit</button>
                    <div class="left"><h3><small>Make it inspirational...</small></h3></div>
                </div>
            </div>    
    </form>
</div>

<?php require '../templates/footer.php'; ?>
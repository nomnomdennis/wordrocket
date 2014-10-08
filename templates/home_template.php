<?php require '../templates/header.php'; ?>

<?php if (isset($_GET["s"]) && $_GET["s"] == "out"): ?>
<div data-alert class="alert-box success radius">
    <div class="center">
        <strong>Goodbye!</strong> <br> You have successfully logged out.
    </div>
    <a href="#" class="close">&times;</a>
</div>
<?php endif ?>
<div class="small-offset-1 small-10 large-offset-1 large-10 columns center">
        <iframe width="640" height="360" src="//www.youtube.com/embed/XowkY1r6b7M" allowfullscreen></iframe>
</div> 
<hr>
<div class="small-offset-1 small-10 large-offset-1 large-10 columns">
        <div class="panel radius center callout">
            <h1><strong><?php print("{$word}");?></strong></h1>
        </div>
</div>
<div class="small-6 large-centered columns center">
<img src="/img/pen.png" alt="pen">
</div>
<div class="panel radius callout center small-offset-3 small-6 large-offset-3 large-6 columns">
    <h1><strong><?php print("{$word}");?></strong></h1>
            <h2 class="subheader">is today's word.</h2>
</div>

<hr>

<div class="center">
    <?php if (empty($_SESSION["id"])): ?>
        <a href="#" data-reveal-id="LOGINMODAL" class="button">Login</a> 
        <a href="#" data-reveal-id="REGISTERMODAL" class="button">Register</a>
    <?php else: ?>
        <a href="editor.php" class="button">Write something.</a>
    <?php endif ?> 
</div>




<?php require '../templates/footer.php'; ?>
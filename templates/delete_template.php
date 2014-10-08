<?php require '../templates/header.php'; ?>
<div class="container">
    <h2> You have successfully deleted! </h2>
</div>
<hr>
<h4 class="center"> Was it an accident? </h4>
<div class="center">  
    <form data-abide name="newstory" action="delete.php" method="POST">
        <div class="large-offset-2 large-8 columns">
            <div class="form-group">
                <input name="story" type="hidden" value="<?php print("$story");?>">
                <input name="word" type="hidden" value="<?php print("$word");?>">
            </div>
            <div class="form-group center">
                <button class="button" type="submit">Undo</button>
            </div>
        </div>    
    </form>
</div>
 

<?php require '../templates/footer.php'; ?>
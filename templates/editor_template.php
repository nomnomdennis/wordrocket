<?php require '../templates/header.php'; ?>

<div class="center">
        <h1>Today's word: <strong><?php print("{$word}");?></strong></h1>
</div>

<hr>

<div class="center">  
    <form data-abide name="newstory" action="editor.php" method="POST">
        <div class="large-offset-2 large-8 columns">
            <div class="form-group">
                <textarea cols="50" maxlength="200" rows="12" name="story" placeholder="Something related to <?php print("{$word}"); ?>, maybe?" onkeyup="countChar(this)" required></textarea>
                <small class="error">You need to write something....</small>
            </div>
            <div class="form-group center">
                <button class="right button" type="submit">Submit</button>
                <div class="left"><h3><small>200 character limit. <br> Limit one story per day. </small></h3></div>
            </div>
        </div>    
    </form>
</div>

<?php require '../templates/footer.php'; ?>
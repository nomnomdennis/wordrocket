<?php require '../templates/header.php'; ?>

<div class="small-offset-1 small-5 large-offset-1 large-5 columns">
    <dl class="sub-nav">
        <dt>View:</dt>
            <dd class="active"><a href="browse.php?view=grid">Grid</a></dd>
            <dd><a href="browse.php?view=list">List</a></dd>
    </dl>
</div>    
<div class="small-5 large-5 columns">    
    <a href="#" data-dropdown="drop" class="button tiny dropdown right">Filter by words:</a><br>
    <ul id="drop" data-dropdown-content class="f-dropdown">
        <li>
            <a href="categories.php"><strong>browse all words</strong></a>
        </li>        
        <?php
            $days = query("SELECT DATEDIFF(CURDATE(), '2013-11-25') AS DiffDate");
            $categories = query("SELECT * FROM words WHERE id <= ?", $days[0]["DiffDate"]);

            foreach($categories as $category)
            {
                $url = "browse.php?category=" . rawurlencode($category["word"]);
                print("<li><a href=\"{$url}\">{$category["word"]}</a></li>");
            }    
        ?>
    </ul>
</div>
<hr>
<div class="small-offset-1 small-10 large-offset-1 large-10 columns">    
    <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
        <?php
            $stories = query("SELECT * FROM stories;");

            foreach($stories as $story)    
            {                    
                $userurl = "browse.php?user=" . "{$story["username"]}";
                $categoryurl = "browse.php?category=" . rawurlencode($story["word"]);
                $storyurl = "browse.php?id=" . "{$story["id"]}";
                
                print("<li>");
                print('<div class="panel radius">');
                print("<h5><a href=\"{$userurl}\">{$story["username"]}</a><a href=\"{$categoryurl}\"><span class=\"radius label right\">{$story["word"]}</span></a></h5>");
                print("<hr>");
                print("<p>{$story["story"]}</p>");
                if (isset($_SESSION["id"]))
                {    
                    $users = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
                    $username = $users[0]["username"];
                    
                    if ($username == $story["username"])
                    {
                        print("<h6>");
                        print("<a class=\"delete\" href=\"delete.php?delete={$story["id"]}\">Delete</a>");
                        print("</h6>");
                    }
                }
                print("<h6><a href=\"{$storyurl}\" class=\"right\">&rarr;</a></h6>");
                print("</div>");
                print("</li>");
            }    
        ?>
    </ul>
</div>    
<hr>

<?php require '../templates/footer.php'; ?>
<?php require '../templates/header.php'; ?>

<?php if (isset($_GET["category"]) || isset($_GET["user"]) || isset($_GET["id"])): ?>
<div class="small-offset-1 small-10 large-offset-1 large-10 columns">
    <h3 class="center">
        <?php
            if (isset($_GET["category"]))
            {
                $check = query("SELECT * FROM words WHERE word = ?", $_GET["category"]);
                if (count($check) == 1)
                {   
                    echo "stories about <strong>" . htmlspecialchars($_GET["category"]) . " </strong>";
                }   
            }
            elseif (isset($_GET["user"])) 
            {
                $check = query("SELECT * FROM users WHERE username = ?", $_GET["user"]);
                if (count($check) == 1)
                {
                    echo "stories by <strong>" .  htmlspecialchars($_GET["user"]) . " </strong>";     
                }   
            }
            else 
            {
                $check = query("SELECT * FROM stories WHERE id = ?", $_GET["id"]);
                if (count($check) == 1)
                {
                    echo "<strong>" . htmlspecialchars($check[0]["username"]) . "'s </strong> story about <strong>" . htmlspecialchars($check[0]["word"]) . "</strong>";     
                }       
            }    
        ?>
    </h3>
</div>
<hr>    
<? else: ?>
<div class="small-offset-1 small-5 large-offset-1 large-5 columns">
    <dl class="sub-nav">
        <dt>View:</dt>
            <dd><a href="browse.php?view=grid">Grid</a></dd>
            <dd class="active"><a href="browse.php?view=list">List</a></dd>
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
<?php endif ?>

<div class="small-offset-3 small-6 large-offset-3 large-6 columns">
        <?php
            if (isset($_GET["user"]))
            {
                $stories = query("SELECT * FROM stories WHERE username = ?", $_GET["user"]);
                if (count($stories) == 0)
                {
                    print("</div>");  
                    print("<h4 class=\"center\">There is nothing here!</h4>");
                    require '../templates/footer.php';
                    return;
                }                  
            }

            else if (isset($_GET["category"]))
            {
                $stories = query("SELECT * FROM stories WHERE word = ?", $_GET["category"]);
                if (count($stories) == 0)
                {
                    print("</div>");  
                    print("<h4 class=\"center\">There is nothing here!</h4>");
                    require '../templates/footer.php';
                    exit;
                }    
            }
            elseif (isset($_GET["id"]))
            {
                $stories = query("SELECT * FROM stories WHERE id = ?", $_GET["id"]);
                if (count($stories) == 0)
                {
                    print("</div>");  
                    print("<h4 class=\"center\">There is nothing here!</h4>");
                    require '../templates/footer.php';
                    exit;
                }                    
            }    
            else
            {    
                $stories = query("SELECT * FROM stories;");
            }    

            foreach($stories as $story)    
            {
                $userurl = "browse.php?user=" . "{$story["username"]}";
                $categoryurl = "browse.php?category=" . rawurlencode($story["word"]);
                $storyurl = "browse.php?id=" . "{$story["id"]}";
                
                print('<div class="panel radius">');
                print("<h5><a href=\"{$userurl}\">{$story["username"]}</a><a href=\"{$categoryurl}\"><span class=\"radius label right\">{$story["word"]}</span></a></h5>");
                print("<hr>");
                print("<p>{$story["story"]}</p>");
                print("<h6>");
                if (isset($_SESSION["id"]))
                {    
                    $users = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
                    $username = $users[0]["username"];
                    if ($username == $story["username"])
                    {
                        print("<a class=\"delete\" href=\"delete.php?delete={$story["id"]}\">Delete</a>");
                    }
                }
                print("<a href=\"{$storyurl}\" class=\"right\">&rarr;</a>");
                print("</h6></div>");
            }
        ?>
    
</div>    



<hr>
<?php require '../templates/footer.php'; ?>
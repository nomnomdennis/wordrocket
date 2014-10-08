<?php

    // configuration
    require("../includes/config.php"); 

    // check if something wants to get deleted
    if (isset($_GET["delete"]))
    {
        // escape it just in case
        $link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
        $deleteid = mysqli_real_escape_string($link, $_GET["delete"]);
        
        // get the username of the current user
        $users = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $username = $users[0]["username"]; 
        
        $owners = query("SELECT * FROM stories WHERE id = ?", $deleteid);
        if (count($owners) == 1)
        {   
            // find the owner of this story
            $owner = $owners[0]["username"];
            
            // make sure it is actually the owner who wants to delete it
            if ($username == $owner)
            {
                // store temporary copy in case they want to undo
                $story = $owners[0]["story"];
                $word = $owners[0]["word"];
                
                // delete it
                $query = query("DELETE FROM stories WHERE username= ? AND id= ?", $username, $deleteid);   
                require ('../templates/delete_template.php');
                exit;
            }    
        }
        
        else
        {
            redirect("index.php");
        } 
    }

    // if they want to undo
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $users = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $username = $users[0]["username"]; 
        
        // put it back in 
        $insert = query("INSERT INTO stories (username, word, story) VALUES(?, ?, ?)", $username, $_POST["word"], $_POST["story"]);
        $get = query("SELECT * FROM stories WHERE username = ? AND word = ?", $username, $_POST["word"]);
        
        // take them there
        $url = "browse.php?id=" . $get[0]["id"]; 
        redirect("{$url}");
    }

    else
    {
        redirect("index.php");
    }    
    
?>
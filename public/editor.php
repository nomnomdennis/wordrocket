<?php

    // configuration
    require("../includes/config.php"); 

    // get the word of the day
    $days = query("SELECT DATEDIFF(CURDATE(), '2013-11-25') AS DiffDate");
    $words = query("SELECT * FROM words WHERE id = ?", $days[0]['DiffDate']);
    $word = $words[0]["word"];

    // get the current user
    $users = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    $username = $users[0]["username"];
    
    // make sure they didn't already write a story
    $checks = query("SELECT * FROM stories WHERE username = ? AND word = ?", $username, $word); 
        
    if (count($checks) == 1)
    {
        // if they did take them there
        $url = "browse.php?id=" . $checks[0]["id"]; 
        redirect("{$url}");
    }

    // set title
    $title = "writing... | WordRocket";

    // when they submit
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $story = $_POST["story"];
        
        // insert it in
        $insert = query("INSERT INTO stories (username, word, story) VALUES(?, ?, ?)", $username, $word, $story);
        $get = query("SELECT * FROM stories WHERE username = ? AND word = ?", $username, $word);
        
        // take them there
        $url = "browse.php?id=" . $get[0]["id"]; 
        redirect("{$url}");
    }
    
    else
    {    
        // show the page for them to write
        require ('../templates/editor_template.php');
        exit;
    }
?>

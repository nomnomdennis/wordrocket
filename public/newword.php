<?php 
   
    // make title
    $title = "new word | WordRocket";

    // configuration
    require("../includes/config.php");    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // clear the word
        $link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
        $clearedword = mysqli_real_escape_string($link, $_POST["word"]);
        
        // make it lowercase
        $clearedword = strtolower($clearedword);
        
        // check the word
        $checks = query("SELECT * FROM words WHERE word = ?", $clearedword); 
        $filter = query("SELECT * FROM wordlist WHERE word = ?", $clearedword); 
        
        // make sure not profanity or repeat
        if (count($checks) != 0)
        {
            redirect("newword.php?t=repeatalert");    
        }        
        else if (count($filter) != 0)
        {
            redirect("newword.php?t=inappropriate");      
        }    

        // then insert
        query("INSERT INTO words (word) VALUES(?)", $clearedword);
        redirect("newword.php?t=success");      

    }
    
    else
    {
        // else render entry form
        require ('../templates/newword_template.php');
        exit;
    }
    
?>
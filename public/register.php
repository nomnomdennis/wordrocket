<?php

    // configuration
    require("../includes/config.php");

    // make title
    $title = "register | WordRocket";

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // escape everything
        $link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
        $username = mysqli_real_escape_string($link, $_POST["username"]);
        $password = mysqli_real_escape_string($link, $_POST["password"]);
        
        // query database for the new username
        $rows = query("SELECT * FROM users WHERE username = ?", $username);
        
        // if username is already exists (taken)
        if (count($rows) == 1)
        {
            // alert message
            $info["message"] = "Username already taken.";
            require ('../templates/register_form.php');
            exit;
        }
        
        // check password = confirmation
        else
        {
            // put data into database
            query("INSERT INTO users (username, hash) VALUES(?, ?)", $username, password_hash($password, PASSWORD_DEFAULT));
            
            // retrieve user id and put it in session
            $new = query("SELECT LAST_INSERT_ID() AS id");
            
            $_SESSION["id"] = $new[0]["id"];
            
            //redirect to index.php
            redirect("index.php"); 
        }
    }
    
    else
    {
        if (isset($_SESSION["id"]))
        {
            redirect("index.php");
        }
        
        // else render form
        require ('../templates/register_form.php');
        exit;
    }

?>
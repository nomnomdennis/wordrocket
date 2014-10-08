<?php

    // configuration
    require("../includes/config.php"); 

    // make title
    $title = "login | WordRocket";

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
        $username = mysqli_real_escape_string($link, $_POST["username"]);
        
        // validate submission
        if (empty($_POST["username"]))
        {
            // alert message
            $info["message"] = "You must enter your username.";
            require ('../templates/login_form.php');
            exit;
        }
        else if (empty($_POST["password"]))
        {
            // alert message
            $info["message"] = "You must enter your password.";
            require ('../templates/login_form.php');
            exit;
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $username);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["hash"]) == TRUE)
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];

                //redirect to some other location
                redirect("editor.php");
            }
            else
            {
                // else error
                $info["message"] = "Invalid Username/Password";
                require ('../templates/login_form.php');
                exit;        
            }    
        }
        else
        {    
            // else error
            $info["message"] = "Invalid Username/Password";
            require ('../templates/login_form.php');
            exit;
        }
    }
    else
    {
        // can't login if you already did
        if (isset($_SESSION["id"]))
        {
            redirect("index.php");
        }

        require ('../templates/login_form.php');
        exit;
    }

?>

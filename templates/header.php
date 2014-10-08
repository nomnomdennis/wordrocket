<DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>
    <?php
    if (isset($title))
    {
        print("$title");
    }
    else
    {
        print("WordRocket | a story a day");
    }    
    ?>
    </title>
    <link rel="icon" type="image/ico" href="/img/favicon.ico"/>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700,200' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/foundation.css">
    <script src="js/modernizr.js"></script>

    <link href="/css/style.css" rel="stylesheet" />
</head>
    <?php
        $days = query("SELECT DATEDIFF(CURDATE(), '2013-11-25') AS DiffDate");
        //print("{$days[0]['DiffDate']}");
        $words = query("SELECT * FROM words WHERE id = ?", $days[0]['DiffDate']);
        $word = $words[0]["word"];

        if (isset($_SESSION[ "id"]))
        {    
            $users = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
            $username = $users[0]["username"];
        }    
    ?>
<body>
    <div class="wrapper">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1>
                    <a href="index.php">WordRocket</a>
                </h1>
            </li>
        </ul>
        <section class="top-bar-section">

            <ul class="right">
                <?php if (isset($_SESSION["id"])): ?>
                <li class="has-dropdown">
                    <a href="#">Welcome, <?php print("{$username}"); ?>!</a>
                    <ul class="dropdown">
                        <li>
                            <a href="newword.php">New Word</a>
                        </li>
                        <li>
                            <a href="editor.php">Write something.</a>
                        </li>
                        <li>
                            <a href="<?php echo "browse.php?user=" . "$username"?>">My Stories</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php">Log Out</a>
                        </li>
                    </ul>
                </li>
                <?php else : ?>
                <li class="has-dropdown">
                    <a href="#">Join Us!</a>
                    <ul class="dropdown">
                        <li>
                            <a href="#" data-reveal-id="LOGINMODAL">Login</a>
                        </li>
                        <li>
                            <a href="#" data-reveal-id="REGISTERMODAL">Register</a>
                        </li>
                    </ul>
                </li>
                <?php endif ?>
            </ul>

            <ul class="left">
                <li>
                    <a href="browse.php">Browse</a>
                </li>
                <li class="has-dropdown">
                    <a href="#">About</a>
                    <ul class="dropdown">
                        <li>
                            <a href="documentation.php">Documentation</a>
                        </li>
                        <li>
                            <a href="design.php">Design</a>
                        </li>
                    </ul>
                </li>
                <li class="has-dropdown">
                    <a href="#">Misc</a>
                    <ul class="dropdown">
                        <li>
                            <a href="astro.php">Astrophysics</a>
                        </li>
                        <li>
                            <a href="#">Physics</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </nav>
    <div class="top"></div>
    <div id="secondbody">
    <div id="LOGINMODAL" class="reveal-modal small" data-reveal>
        <div class="container">
            <h2>Log In</h2>
        </div>
        <hr>
        <div class="container">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input autofocus class="form-control" name="username" id="username" placeholder="Username" type="text" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>   
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                </div>
                <div class="form-group">
                    <button type="submit" class="button">Log In</button>
                </div>
            </form>
        </div>
        <a href="#" data-reveal-id="REGISTERMODAL" class="button small secondary">Register</a>
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <div id="REGISTERMODAL" class="reveal-modal small" data-reveal>
        <div class="container">
            <h2>Register</h2>
        </div>
        <hr>
        <div class="container">
            <form data-abide action="register.php" method="post">

                    <div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" placeholder="Username" name="username" required>
                            <small class="error">Required</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>                            
                            <input type="password" id="password" placeholder="Password" name="password" required>
                            <small class="error">Passwords must be at least 8 characters with 1 capital letter, 1 number, and one special character.</small>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" placeholder="Re-enter Paswword" name="confirmPassword" required data-equal="password">
                            <small class="error" data-error-message>Passwords must match.</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button">Register</button>
                        </div>
                    </div>

            </form>
        </div>
        <a href="#" data-reveal-id="LOGINMODAL" class="button small secondary">Login</a>
        <a class="close-reveal-modal">&#215;</a>
    </div>
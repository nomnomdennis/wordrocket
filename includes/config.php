<?php
    /**
     * config.php
     *
     * Dennis Lee
     * Final Project
     * 
     * Orignially from Problem Set 7
     *
     * Configures pages.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();

    // require authentication for most pages
    if (!preg_match("{(?:login|logout|astro|register|browse|categories|index|about|documentation|design)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php?i=LOG_IN_YOU_FOOL");
        }
    }           
?>

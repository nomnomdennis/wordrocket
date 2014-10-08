<?php

    // configuration
    require("../includes/config.php"); 

    // log out current user, if any
    logout();

    // redirect user and acknowledge
    redirect("index.php?s=out");

?>

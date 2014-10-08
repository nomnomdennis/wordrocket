<?php
    // require config file 
    require '../includes/config.php'; 
    
    // set title
    $title = "browse stories";
    
    // display according to how it wants to look like
    if (isset($_GET["view"]))
    {   
        if ($_GET["view"] == "grid")
        {
            require ('../templates/grid_display_template.php');
            exit;
        }
        
        else if ($_GET["view"] == "list")
        {
            require ('../templates/list_display_template.php');
            exit;
        }  
        
        else
        {
            require ('../templates/grid_display_template.php');
            exit;
        }    
    }
    
    // if specified, specify
    else if (isset($_GET["category"]) || isset($_GET["user"]) || isset($_GET["id"]))
    {       
        require ('../templates/list_display_template.php');
        exit;
    }    
                
    
    // otherise GRID MODE!
    else
    {
        require ('../templates/grid_display_template.php');
        exit;
    }    
?>
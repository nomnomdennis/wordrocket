<?php require '../templates/header.php'; ?>

<div class="small-offset-1 small-10 large-offset-1 large-10 columns">
    <h1>Design</h1> 
</div>    

<hr>

<div class="small-offset-1 small-10 large-offset-1 large-10 columns">
    
<p>This website is built using a combination of HTML, CSS, Javascript and PHP with an SQL database. In order to properly run this website, a server with an SQL databse must be running with a copy of the attached SQL database.</p>

<p>Based the MVC method, the website is distributed among three folders: public, templates, and includes. In the "includes" folder are 'config.php', 'constants.php', and 'functions.php' that define global variables and functions. The "public" folder contains the files that the users interact with and contains most of the PHP code needed for the site to interact with the SQL server. Also located here is the 'css' and 'js' folders that contain the CSS and Javascript files needed for the site. The "templates" folder contains most of the HTML code needed to markup the website. Also contained in many of the files here is PHP code needed to display the information based on certain situations.</p>

<p>Most of the features of the site uses the Foundation front-end framework. Things such as the modals are from the Foundation framework. In addition, the website uses the 'Raleway' font for most of its text. This font is from Google Web Fonts.</p> 

<p>The website is able to display a different word everyday by using a base date. Using the DATEDIFF() function, the website calculates the difference between today's date and a base date. That number becomes a number that corresponds to the id number of certain word. This word is calculated and used throughout the site.</p> 

<p>Many of the forms used, such as when registering, submitting a story, or submitting a word is verified using the Abide validation library included with Foundation. It allows the website to conduct instant verification of that all fields are entered properly before being submitted. The only exception is logging in, where PHP code is used instead to verify input. The reason for this is because I wanted to test the "alert" features offered by the Foundation framework.</p>

<p>Browsing of the stories is all done using two files: "browse.php" and "browse_template.php". Using the "$_GET" method of sending information, we can go from view everything to viewing one specific story to from viewing it in grid form to viewing it in list form. The reason for this is because I felt that coding PHP code for display would be fun. Using multiple if-else loops I could have a display for every situation without having multiple files.</p>

<p>Entering words is done simply by inserting the word into a SQL table. However, before being entered the word is checked against the table to ensure there are no duplicates. The word is also converted to lowercase to stay with the theme. The word is also checked against a table of profanity provided by banbuilder.com. From tests, it seems to function fairly well.</p> 

<p>Deletion of story is allowed to be reversed as, before the data is deleted from the table, it is stored in temporary variables that the user can choose to insert back in one last time. The original intention was not to have this feature. However, I realized that if the word the story was written about is not today's, it cannot be replaced, so I gave the user one last chance.</p>    

</div>

<hr>
<?php require '../templates/footer.php'; ?>
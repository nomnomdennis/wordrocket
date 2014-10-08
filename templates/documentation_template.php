<?php require '../templates/header.php'; ?>

<div class="small-offset-1 small-10 large-offset-1 large-10 columns">
    <h1>Documentation</h1> 
</div>    

<hr>

<div class="small-offset-1 small-10 large-offset-1 large-10 columns">
    
<p>To set up the website, the included SQL database must be active and running on a server. The homepage of the website is located in 'public'. Thus the domain/localhost should point there.</p>

<p>This website allows registered users to post short, less than 200 character stories, that can be seen by other users, registered and unregistered. These stories are based on a word that changes every 24 hours. However, every user is limited to only one story per word and thus per day.</p> 

<p>Users can register by inputting a username and a password. They are automatically logged in the first time. After registering, the user is allowed to write their first story. The intention is for the story to be related to the word of the day. After writing the story the user can browse stories of other users. When browsing, the user can filter by word or by user.</p> 

<p>Users can also remove their stories at anytime. If the story is written by the user, a 'Delete' button will always be at the bottom left corner near that story. Clicking it will delete the story and take the user to a page confirming its deletion. At that page, however, the user is allowed to undo that delete in the event that it is an accident. This will add the story back in to the website.</p> 

<p>Registered users are also allowed to submit words that are queued up for use as the word of the day. Words are never repeated and profanity is filtered out as much as possible. Users are not limited to the number of words they add to the database.</p> 

</div>

<hr>
<?php require '../templates/footer.php'; ?>
<?php
/*
Description: comment page.
Author: Oliver Dickens
*/

include "../Model/session.php";
include 'header.php';
include 'navbar.php';
?>
<html>
<body>
  <main>
    <div class="container text-center jumbotron mt-5">
      <!-- apoligies for this blob of text, not my finest work  -->
        <h1>Block 1</h1><br>
      <p>Bootstrap has an incredible library, with a vast number of items designed to suit different styles with an easy to follow styling guide. In the first three weeks i played a lot with the styling of how my site will look using bootstrap and I’m super glad I did as I’ve learned a lot about bootstrap and its styling. The first element I want to talk about is bootstraps col grid sizes. This is the main reason I believe bootstrap is as popular as it is. Making any container with a row inside allows you to position your content anyway you want using (div class ="col") . Bootstrap grid system runs on a number system up to 12, any grouping can be used 6-6, 4-4-4 or even 3-3-3-3. This means content can be managed and manipulated far easier than it would through regular css and html.  </p><br>
      <p>Another element I wish to discuss is the inclusion of bootstrap buttons. Regular ww3Schools buttons or the stand buttons that come with html are incredibly outdated and to use of css to customize these requires a lot of code and understanding. In all my websites I have created I have used bootstrap button as not only have they a good-looking style, but they are also look clean and are easily changed appearance wise. The color range is excellent with the change of a word like success or danger you can bring life to your page. I personally like to make a ( :root ) variable in my css and change the bootstrap colors as they actually intended to make it easy to do, ( --button-primary: ) default is blue but using a hex color set this into a variable. This is incredible for us programmers as we no longer must dive through css changing colors, one simple change in the root variable at the top of css does it all. This is all because of how bootstrap works.</p><br>
      <p>My last element is the inclusion of cards, I have used this in various places on my site and as much as see the utility of the cards I just can’t bring myself to say I enjoy using them. In this module however I have learned how they function, built with flexbox the cards are the designed to deliver control. By default, the card has no margins, white spacing and no fixed width, this is by design to give the programmer utility when filling it with content.</p><br>
      <p>Below is an image of my database, it clearly displays the tables structure and their relationships to other tables. This one image also displays my primary and secondary keys, unique and index items. I feel this task didn’t allow us to talk much about the importance of database, I feel this is wrong as it’s a fundamental part of our course and is essential we test the strengths and weakness of our database. </p><br>
      <img src="images/comments/database.png" alt="my database">
      <p>Below is my getTeamByID function, as I made my tables strict for good database practices, this is also a valuable security improvement, I had to extra work in the query’s to join tables, below is three way join on c_team, this means four tables are used to display all data using one common value key.</p><br>
      <img src="images/comments/getTeambyID.png" alt="my function">

      <h1>Block 2</h1><br>
      <p><b>Security measures: </b>The user can only see 6 questions from the database in block 2 and is unable to interact with these unless the user signs in. When the user is signed in i decided that if the they wished to add update or remove questions the user will be moved to another page, I did this because its far safer to have a add update or remove question on a page dedicated to that one task. I used an an ifelse. if(isset($_SESSION['UserLoggedIn'])) to display the crud data else the user will see a $validError and moved back to the index page.  I have used FILTER_SANITIZE_STRING to prevent slq injection when entering any data into the database. This removes tags and encodes special characters from strings. Making the database more secure. I wanted to have error messages presented to the user but not to impact the users screen, I therefore left the error messages in the url in bold left to highlight an error. I have a session status in place where if a user is logged in for more than one day 86400 second the user will be logged out. </p><br>
      <p> <b>Log-In/Log-Out: </b>I have a sign in form in the navigation bar that leads to a duel registration and log-in page called registerSignInPage.php. Here the user will need to register a new account before logging in. The user’s passwords are hashed and sanitized before being logged into the database. When the user logs-in the sign-in option will disappear in the users nav and the users name will be displayed in its place along with a logout option. This whole process is made with the user being only a couple of clicks away from one page. If the user wishes the log out, they can click the option in the nav and return to the index page. This does two things; one ends the users session and the second starts a new one.  If the user is signed in and wishes to add a question then the steps are easy to follow, a bright add question button on block two pushes the user to a new page displaying a insert question form, once submitted the form is  sanitized and sent to the controller before the methods api inserts into the database. </p><br>

      <h1>Block 3</h1><br>
      <p> In this diagram I display how the imps pins 5 and 7 states get stored in my database. </p><br>
      <img src="images/comments/pins57.png" alt="my function">
      <p> Below is an IMP Diagram on how the “get Temps” moves to the wep application, pins 8 and 9.</p><br>
      <img src="images/comments/pins89.png" alt="my function">
      <p>The imp device holds squirrel code that collects pin temperatures through a thermistor on the imp and also two lights connected to a green and red light on the imp, both of these are recorded every 3600seconds and JSON encoded through the agent to API-Methods in my Model folder. It is from here the data becomes decoded and passed into the database as a string message.  </p><br>
      <img src="images/comments/imp.png" alt="my function">
      <p><b>Advantages of using JSON</b> </p><br>
      <p>More and more software developers learn programming each day and a good place to start is with websites, the defect-o design patterns they learn is with html, CSS and JavaScript, these are the basic static languages everyone learns, but JSON is a dynamic language that is becoming more and more popular over its static counter parts. One advantage is when mobiles open or uses an app using JSON it sends a synchronous request to a server and in response the server sends back data, this is considerably fast. A simple request and a response, with this we can build apps or sites without storing data but requesting it, this is a significant as the database is the only place any data is stored, you can still store data and if you wanted to then this is quick and easy to set up, as JSON can have imbedded multidimensional arrays which can point to all the data you require. JSON is also a useful in fact that it doesn’t require complex queries and when formatted is human readable.</p><br>
      <p><b>How Hive stores Data </b></p><br>
      <p>Hive have multiple products which do many thing and this means they must cater for huge amounts of data, upon reading I’ve learnt they use apache Hive, “this is a open source data warehouse software for reading, writing and managing the large data sets that are stored directly in the apache Hadoop distributed file system or other data storage systems like Apache HBase.”(Ref:https://www.ibm.com/analytics/hadoop/hive). </p><br>
      <p>I believe Hive will have a massive data set of tables with users and products most likely having the most data stored. Security on these databases would require both explicit and implicit testing before any new data, query’s, tables or new databases are built. Hive uses a distributed filesystem called HDFS <i> Hadoop Distributed File System, </i> that can store upwards of tens of petabytes of data. </p><br>

      <h1>Block 4</h1><br>
      <p> </p></br>
    </div>
<?php
include 'footer.php';
include '../Controller/ajaxScript.php';
include '../Controller/navControl.js';
?>
</main>
</body>
</html>

# Employee Magaging System

This project was created to support drivers management in a local pizza restaurant that I worked in. It gives you a possibility to register as a manager, then add your list of drivers to the database and after each working day you make a report who has worked on this day and how many hours have they worked. Those shifts are also stored in a DB and you can request the website to generate a summary from selected time period. More functionalities are yet to be done

## Technologies
  * HTML 5
  * CSS 3
  * PHP 7
 * jQuery 3.2.1
 * Bootstrap 4
I have also used a basic MVC framework written by myself

## Configuration
To run the project you have to have a PHP server that supports MySQL. I personally use XAMPP.
After you clone my repo into "workers" directoryt there are some things that you must change in code to make it work.
* Create a new database (name it "workers") and then import workers.sql file into it.
* In app/config/config.php change the DB params and the URL root.
* In public/.htaccess change **Rewrite Base** field so that it is a path to public directory

After all that you should be able to succesfully run the webpage

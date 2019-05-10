# CSE201-Project

Welcome to the Developer Documentation for AppSurf!

Appsurf is a fully functional web page designed to be hosted from an Apache Server 
with an SQL database installed.

**Set Up**

To set up AppSurf, follow these steps:
	1. Place the project folder in the public pages directory of your apache web server. Make sure you have permissions to create and edit your SQL database.
		If you do not have access to a public web server, you can use download and setup a local one, we would recommend WAMP or XAMPP for windows, or MAMP for mac. 
	2. After you've set up your Apache server and SQL database, edit the 'database/SQLcredentials.php' file with any text editor to include the host, user, database name, and password
		to your database (the host name will most likely be 'localhost'). Then run the tables.sql file to set up your database correctly.
	3. (Optional) You may also choose to run the build script we have included in the project, as this is a web page, this step is optional, and for a fresh install of the project, often unecessary.
		If you run into technical problems in the future we would recommend running the build script to verify the contents of the project. To run the build script, you just have to run it with
		phpphing, a popular build tool for php applications.
	4. Congratulations, the project is now set up! You may access it through any browser by entering the url to the index.php page, 
		for example: http://localhost/201project/index.php 
		
**Overview**
	Since this project is a web application, we've included a link to a build on the universities public linux server, however, the university does not allow us to create SQL databases on that server, 
	so SQL operations are *not* supported on that build, it is merely to demonstrate that the project runs as a public web page.
		The link to that build:  http://ceclnx01.cec.miamioh.edu/~wrightes/201project/index.php 
		
	Default users we have included in the database are:
		username: 'user', password: 'password', no special permissions.
		username: 'moderator', password: 'password', moderator permissions.
		username: 'admin', password: 'password', admin permissions.
		
	This project was developed with a combination of html, javascript, and most importantly php. 
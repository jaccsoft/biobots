# biobots
Web application using Laravel PHP framework 5.0 (php version 5.4) to build a tool for Biobots customers and internal team to analyze print information and results. 

For an easy review: 
This app was deployed at: http://codedition.com/biobotapp/public/
I have created a quick intro video (it has audio) in the homepage explaining what you should expect after clicking the "Analyze Data Now" button under the video player. This button will take you to a functional demo of the app

Important thoughts (Problems vs solutions): 
Provide the best way to analyze large data sets. This app should display graphics of all the values in the Database. It's also a good practice to quickly identify the minimum, maximum and averages values of large data sets. Use graphics, research about the best way to display the data in an easy but appealing visual way. I have created an "ideation" folder in the root where I will be placing images related to how I started to think about the requested challenge. There are also some layouts that I don't expect them to be considered for the "World best web design magazine" :)

I DO NOT recommend to test the "import" functionality in the top right corner of the app for this version. I've found that it will take too long for large json files and that a better solution would be necessary for example create a Asynchronous Method or a Cron task etc. But my thinking was to provide a way to upload new json files to be Analyzed which I partially accomplished for smaller files (I guess)

Technologies: 
1. PHP 5.4 
2. jQuery 
3. Bootstrap 
4. Laravel Framework 5.0

.env file configuration

DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=biobot_db 
DB_USERNAME=root 
DB_PASSWORD='1qazxsw2'

Database database/biobot_db.sql


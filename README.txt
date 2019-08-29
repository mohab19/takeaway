1- I choosed laravel 5.8 as the latest version with phpunit 7.5.
2- Used latest Docker version with PHP 7.1.28 and MySql 5.7 on the 9000 and 3306 ports
3- if you want to make commands that effects the DB from the CMD please change the DB_HOST variable in the .env file to "localhost" and set it back to the container name "database" to use the web-app from the browser.
4- you can change the /etc/bin variable to avoid the previous instruction.
5- I used the original "User" model as the "customer".
6- Since i don't know how to use Vue.js YET, i decided to make the task with JQuery, to make it light and fast as possible.
7- I divided my views to 4 pages with 1 more as an extension. 
8- Home page to show the orders and their status including their message status.
9- Resturant page to show all the listed resturant in the system with controlling button to view the menu for each resturant (not working because it's not relative to the objectives).
10- Users page to view all the registered users - customers - in the system.
11- Made orders page to make and order on behalf of the User since the scenario is not focused on the users or so I've presumed (could have made roles and to panels).
12- A user be choosen (or for his role append his login ID) resturant is required and the items form the menu.
13- Making an Order module to save orders and show them.
14- User can have many orders (only on undeleviered order at a time) but an order only belongs to one user.
15- orders has a detailed bill in a separated table called "OrderItems" that lists all the items choosen.
16- you can view the detailed bill bu clicking on the eye button on the Home page in front of each order.
17- code testing tests the order storing and the validation on the request.
18- it also tests that home and resturant page are being retrieved properly.
19- Bonus requirement you can click on the check mark and make an order delivered.
18- there's a cronjob function that travirse through orders and sends a feedback request message after 90 minutes of being delivered.
19- you can make a cronjob on your machine or just hit the link after 90 min is past.
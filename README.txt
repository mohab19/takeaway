1- I choosed laravel 5.8 as the latest version with phpunit 7.5.
2- I used the original "User" model as the "customer".
3- Since i don't know how to use Vue.js YET, i decided to make the task with JQuery, to make it light and fast as possible.
4- I divided my views to 4 pages with 1 more as an extension. 
5- Home page to show the orders and their status including their message status.
6- Resturant page to show all the listed resturant in the system with controlling button to view the menu for each resturant (not working because it's not relative to the objectives).
7- Users page to view all the registered users - customers - in the system.
8- Made orders page to make and order on behalf of the User since the scenario is not focused on the users or so I've presumed (could have made roles and to panels).
9- A user be choosen (or for his role append his login ID) resturant is required and the items form the menu.
10- Making an Order module to save orders and show them.
11- User can have many orders (only on undeleviered order at a time) but an order only belongs to one user.
12- orders has a detailed bill in a separated table called "OrderItems" that lists all the items choosen.
13- you can view the detailed bill bu clicking on the eye button on the Home page in front of each order.
14- code testing tests the order storing and the validation on the request.
15- it also tests that home and resturant page are being retrieved properly.
16- Bonus requirement you can click on the check mark and make an order delivered.
17- there's a cronjob function that travirse through orders and sends a feedback request message after 90 minutes of being delivered.
18- you can make a cronjob on your machine or just hit the link after 90 min is past.
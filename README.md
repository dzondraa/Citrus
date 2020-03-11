# Citrus
Web solution for citrus fruit store.

## Idea
One main controller (index.php) which will delegate between requests and other controllers like
products controller, comments controller, login controller. Model will help us to realize 
data to object layer between database and contollers.

## How to launch

- Download repository from github
- Move root folder into htdoc if you are using xampp or similar, or put it in public_html
- Create database, import citrus.sql (location: root folder)
- Change database config with correct parameters - app/Config/database.php
- Admin user - username: admin; password: admin;
- Ready to launch
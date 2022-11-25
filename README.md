# PHP-Ecommerce-Website
A simple PHP Ecommerce Website (from scratch)

0. Clone the repository and go to the code folder
```
  git clone <//Repo-path//>
  cd PHP-Ecommerce-Website
```
1. Create MySQL database named *lab_db*, specify your dbname and password at the file *src/sql/initializeDB.php*. Do the same thing for the file *src/private/controllers/connectDB.php*
2. Install dependencies, you might need composer pre-installed on your machine
```
  composer install
```
3. Initialize the DB by running the file *src/sql/initializeDB.php*
4. If you want to use the Google Authentication feature, you might need to create your crendential key following this [link](https://developers.google.com/identity/gsi/web/guides/overview).
   Replace the variable $CLIENT_ID at line 7 in the file *src/private/controllers/google_login_processing.php* with your credential keys.
5. Replace the value of attribute *data-client-id* at line 54 the file *src/private/views/login.php* with your credential key
6. Now the website is ready to run!

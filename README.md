# OrganizePosts website
- this site include home page,about and contact. you can register account and login to dashboard.
- then you can add posts and edit it and can tag another people in your post.

# Used Languages.
- HTML , CSS , Bootstrap ,JavaScript , PHP , Laravel

# Folders.
- Controller
    - This folder contains all controller class that implement and combine between model and view.
- Lang
    - this folder contains the languages to switch as you like (En, Fr).
- Auth 
    - this folder to authentication
- Front
    - this folder include every thing about UI(such as home page,about,contact)
- Setting
    - this folder contains the setting in the footer to change it as you like.
- Models
    - This folder contains All model in database.
- Views
    - This folder contains everything related to UI.
- Mail
    - This folder contains file that can help you to connect with us via mail.
- Test
    - this folder contains file that help you testing you app.

# Packages:
    - laravel\ui 
        - this package to Authentication
    - phpunit defualt with laravel framework
        - to test your app

# Instruction for run app Locally.
- web server like (Xampp,Nginx) to start (Apche and MySQL)
- Run (php artisan serv)
- Run 
    1- php artisan migrate (to build your DB in phpmyadmin)
    2- composer dump-autoload
    3- php artisan db:seed (to create fake data to test)


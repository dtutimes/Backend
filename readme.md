# DTU Times-laravel

-   ## Installation
    -   #### Requirements
        ##### Compser
        Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.
        To check installation of composer simply run this comand in your terminal.
        ```sh
        $ composer
        ```
        if your machine doesn't have composer install, install it from [here](https://getcomposer.org/download/).
        The laravel framwork itself has few requirements, Make sure your machine meets the following requirement
        ##### Framework Dependencies
        -   PHP >= 7.1.3
        -   OpenSSL PHP Extension
        -   PDO PHP Extension
        -   Mbstring PHP Extension
        -   Tokenizer PHP Extension
        -   XML PHP Extension
        -   Ctype PHP Extension
        -   JSON PHP Extension
        #### DTUtimes-laravel Dependencies
        -   php GD - library for image processing.
            If you are missing any dependency you may require to install it. On a linux oriented machine it can installed using apt-get install command.
        ```sh
        $ sudo apt-get install php-json php-xml
        ```
        This will download the latest version of that repository. Or you may specify the version of php you are currently using
        ```sh
        $ sudo apt-get install php7-json
        ```
    -   #### Cloning the Repository
        ```sh
        $ git clone https://github.com/DTU-Times/backend-laravel.git
        ```
    -   #### Installing
        Every laravel has a composer.json file which stores all the information about packages and dependencies.
        Make sure you are in projecy directory, then run the composer install command
        1. For Development environment.
            ```sh
            /backend-laravel $ composer install
            ```
        2. For Porduction evironment
           `sh /backend-laravel composer install --no-dev `
           The --no-dev flag will restrict composer to install dev-dependencies (The dependencies in require-dev).
           After successfull istallation, first you need to config the environment file .env.
           In you terminal run artisan key:generate command to create and set an app key.
        ```sh
        /laravel-backend $ php artisan key:genrate
        ```
        #### DataBase Settings
        After successfull generation of key, change the DataBase settings in .env.
        ```sh
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=Yourdatabase
        DB_USERNAME=username
        DB_PASSWORD=password
        ```
        After these changes, you may migrate the tables, by running artisan migrate command
        ```sh
        /laravel-backend $ php artisan migrate
        ```
        or
        If you wish to drop all the existing tanles and create new tables, (Fresh)
        ```sh
        /laravel-backend $ php artisan migrate:fresh
        ```
        You Also need to run the seeder for creating default user, Permissions and Roles.
        ```sh
        /laravel-backend $ php artisan db:seed
        ```
        #### Mail Driver Settings
        If you wish to use gmail smtp for sending mail, turn less-secure setting true in you account/security settings, and generate an app password.
        ```sh
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=example@gmail.com
        MAIL_PASSWORD=passwordgenerated
        MAIL_ENCRYPTION=tls
        ```
        for testing purpose you may set MAIL_DRIVER to log, this will show sent mails in Laravel.log under storage directory.
        ```sh
        MAIL_DRIVER=log
        ```

# Backend

## WEB Routes

-   Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!

-   ### Login
     
     - 

-   ### Password reset

-   ### Superuser Routes

    -   #### Dashboard

    -   #### Edition

    -   #### Facebook/Instagram

    -   #### Roles

    -   #### Permissions

    -   #### Members

        -   ##### Unactive Users

        -   ##### Blocking system

        -   ##### User CRUD

        -   ##### Show/Not show User

-   ### Council Routes

    - #### Dashboard

    - #### Campaign

    - #### Subscriber

    - #### Stories routes beyond CRUD

    - #### Society routes beyond CRUD

    - #### Notification

    - #### Stats

-   ### Analytics

-   ### Album Routes
    
    - #### Images Routes

-   ### Society Routes
     
    - #### Images

    - #### News


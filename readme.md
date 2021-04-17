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


<!-- 
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
-->

## Getting Involved

Please read the [Code of Conduct](https://github.com/ikaul29/Backend/blob/master/code_of_conduct.md) before filing an issue. This is our professional working environment and we want to keep our workspace clean and healthy.

* Fork the Project
* Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
* Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
* Push to the Branch (`git push origin feature/AmazingFeature`)
* Open a Pull Request
* Browse our [current Issues](https://github.com/dtutimes/Backend/issues), or [file a security issue][sec issue].
* Discord: [#discord:DtuTimes](https://discord.com/)
* Check out the [project wiki](https://github.com/dtutimes/Backend) for more information.

**Beginners!** - Watch out for [Issues with the "Good First Issue" label](https://github.com/dtutimes/Backend/issues?q=is%3Aopen+is%3Aissue+label%3A%22good+first+issue%22). These are easy bugs that have been left for first timers to have a go, get involved and make a positive contribution to the project!

## Code of Conduct

This project and everyone participating in it is governed by the [DTU Times Code of Conduct](code_of_conduct.md). By participating, you are expected to uphold this code. Please report unacceptable behavior to [dtutimes@dtu.ac.in](mailto:dtutimes@dtu.ac.in).

## I want to open a Pull Request!

We encourage you to participate in this open source project. We love Pull Requests, Bug Reports, ideas, (security) code reviews or any other kind of positive contribution.

**We do not have the bandwidth to review unsolicited PRs**. Please follow our [privacy policy](https://docs.google.com/document/d/1_ZWVV_4MjjYaLndT3d-A_B773Udhc7qS3eCrLNJf4gs/edit), or **we may close the PR**.

To make it easier to review, we have these PR requirements:

* Every PR must have **exactly** one issue associated with it.
* Write a clear explanation of what the code is doing when opening the pull request, and optionally add comments to the PR.
* Make sure there are tests - or ask for help on how the code should be tested in the Issue!
* Keep PRs small and to the point. For extra code-health changes, either file a separate issue, or make it a separate PR that can be easily reviewed.
* Use micro-commits. This makes it easier and faster to review.
* Add a screenshot for UX changes (this is part of the PR checklist)

As You can keep your PRs small, it helps our team review and merge code faster, minimizing stale code.


PRs may take time to merge depending on the issue you are addressing. If you think your issue/PR is very important,
try to popularize it by getting other users to comment and share their point of view.


## LICENCE

Distributed under the MIT License. See [LICENCE](https://github.com/ikaul29/Backend/blob/master/LICENSE.md) for more information.


## I want to file an issue!

Great! We encourage you to participate in this open source project. We love Pull Requests, Bug Reports, ideas, (security) code reviews or any other kind of positive contribution.

To make it easier to triage, we have these issue requirements:

* Please do your best to search for duplicate issues before filing a new issue so we can keep our issue board clean.
* Every issue should have **exactly** one bug/feature request described in it. Please do not file meta feedback list tickets as it is difficult to parse them and address their individual points.
* Feature Requests are better when they’re open-ended instead of demanding a specific solution -ie  “I want an easier way to do X” instead of “add Y”
* Issues are not the place to go off topic or debate. If you have questions, please mail us at dtutimes@dtu.ac.in ..
* Please always remember our [privacy policy](https://docs.google.com/document/d/1_ZWVV_4MjjYaLndT3d-A_B773Udhc7qS3eCrLNJf4gs/edit)
* Please do not tag specific team members to try to get your issue looked at faster. We have a triage process that will tag and label issues correctly in due time. If you think an issue is very severe, you can ask about it in Matrix.

Please keep in mind that even though a feature you have in mind may seem like a small ask, as a small team, we have to prioritize our planned work and every new feature adds complexity and maintenance and may take up design, research, marketing, product, and engineering time. We appreciate everyone’s passion but we will not be able to incorporate every feature request or even fix every bug. That being said, just because we haven't replied, doesn't mean we don't care about the issue, please be patient with our response times as we're very busy.

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


## Getting Involved

Please read the [Community Participation Guidelines](https://www.mozilla.org/en-US/about/governance/policies/participation/) and the [Bugzilla Etiquette guidelines](https://bugzilla.mozilla.org/page.cgi?id=etiquette.html) before filing an issue. This is our professional working environment as much as it is our bug tracker, and we want to keep our workspace clean and healthy.

* [Guide to Contributing](https://github.com/mozilla-mobile/shared-docs/blob/master/android/CONTRIBUTING.md) (**New contributors start here!**)

* Browse our [current Issues](https://github.com/mozilla-mobile/fenix/issues), or [file a security issue][sec issue].

* Matrix: [#fenix:mozilla.org channel](https://chat.mozilla.org/#/room/#fenix:mozilla.org) (**We're available Monday-Friday, GMT and PST working hours**). Related channels:
  * [#mobile-test-eng:mozilla.org channel](https://chat.mozilla.org/#/room/#mobile-test-eng:mozilla.org): for UI test automation
  * [#perf-android-frontend:mozilla.org channel](https://chat.mozilla.org/#/room/#perf-android-frontend:mozilla.org): for front-end (JVM) performance of Android apps
  * [#android-tips:mozilla.org channel](https://chat.mozilla.org/#/room/#android-tips:mozilla.org): for tips on Android development

* Check out the [project wiki](https://github.com/mozilla-mobile/fenix/wiki) for more information.
  * See [our guide on Writing Custom Lint Rules](https://github.com/mozilla-mobile/shared-docs/blob/master/android/writing_lint_rules.md).

* Localization happens on [Pontoon](https://pontoon.mozilla.org/projects/android-l10n/). Please get in touch with delphine (at) mozilla (dot) com directly for more information.

**Beginners!** - Watch out for [Issues with the "Good First Issue" label](https://github.com/mozilla-mobile/fenix/issues?q=is%3Aopen+is%3Aissue+label%3A%22good+first+issue%22). These are easy bugs that have been left for first timers to have a go, get involved and make a positive contribution to the project!


## I want to open a Pull Request!

We encourage you to participate in this open source project. We love Pull Requests, Bug Reports, ideas, (security) code reviews or any other kind of positive contribution.

Since we are a small team, however, **we do not have the bandwidth to review unsolicited PRs**. Please follow our [Pull Request guidelines](https://github.com/mozilla-mobile/shared-docs/blob/master/android/CONTRIBUTING_code.md#creating-a-pull-request), or **we may close the PR**.

To make it easier to review, we have these PR requirements:

* Every PR must have **exactly** one issue associated with it.
* Write a clear explanation of what the code is doing when opening the pull request, and optionally add comments to the PR.
* Make sure there are tests - or ask for help on how the code should be tested in the Issue!
* Keep PRs small and to the point. For extra code-health changes, either file a separate issue, or make it a separate PR that can be easily reviewed.
* Use micro-commits. This makes it easier and faster to review.
* Add a screenshot for UX changes (this is part of the PR checklist)

As a small team, we have to prioritize our work, and reviewing PRs takes time. We receive lots of PRs every day, so if you can keep your PRs small, it helps our small team review and merge code faster, minimizing stale code.


Keep in mind that the team is very overloaded, so PRs sometimes wait
for a *very* long time. However this is not for lack of interest, but
because we find ourselves in a constant need to prioritize
certain issues/PRs over others. If you think your issue/PR is very important,
try to popularize it by getting other users to comment and share their point of view.

## I want to file an issue!

Great! We encourage you to participate in this open source project. We love Pull Requests, Bug Reports, ideas, (security) code reviews or any other kind of positive contribution.

To make it easier to triage, we have these issue requirements:

* Please do your best to search for duplicate issues before filing a new issue so we can keep our issue board clean.
* Every issue should have **exactly** one bug/feature request described in it. Please do not file meta feedback list tickets as it is difficult to parse them and address their individual points.
* Feature Requests are better when they’re open-ended instead of demanding a specific solution -ie  “I want an easier way to do X” instead of “add Y”
* Issues are not the place to go off topic or debate. If you have questions, please join the [#fenix:mozilla.org channel](https://chat.mozilla.org/#/room/#fenix:mozilla.org).
* Please always remember our [Community Participation Guidelines](https://www.mozilla.org/en-US/about/governance/policies/participation/)
* Please do not tag specific team members to try to get your issue looked at faster. We have a triage process that will tag and label issues correctly in due time. If you think an issue is very severe, you can ask about it in Matrix.

Please keep in mind that even though a feature you have in mind may seem like a small ask, as a small team, we have to prioritize our planned work and every new feature adds complexity and maintenance and may take up design, research, marketing, product, and engineering time. We appreciate everyone’s passion but we will not be able to incorporate every feature request or even fix every bug. That being said, just because we haven't replied, doesn't mean we don't care about the issue, please be patient with our response times as we're very busy.

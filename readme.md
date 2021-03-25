# ARTICLE-BLOG-LARAVEL-PHP-PROJECT

### Table of content 

* General info
* Technologies
* Setup

### Introduction 

This is a simple Laravel app with a blade template engine

### Technologies

* PHP
* Laravel
* Sqlite

### Perequisite

Before launching this project you must ensure that have mysql, php, and composer

Bellow are the links to help you installing it:

    —> www.wampserver.com › download-wampserver-64bits

    —>  https://www.mamp.info/en/downloads/

    —> https://windows.php.net/download/

    —>  https://www.php.net/manual/en/install.macosx.php

    —> https://getcomposer.org/download/


### Launch

    *  git clone git@github.com:JordyBukondaTshibangu/ARTICLE-BLOG-LARAVEL-PHP-PROJECT.git
    * cd ARTICLE-BLOG-LARAVEL-PHP-PROJECT
    * npm install 
    * composer install
    * cp .env.example .env
    * php artisan key:generate
    * php artisan migrate:fresh
    * php artisan storage:link
    * php artisan serve 




## APP STRUCTURE AND KEY POINTS


- [x] API ==> Server
	
	composer create-project laravel/laravel ARTICLE-BLOG-LARAVEL-PHP-PROJECT		

- [x] Database  => Database	
	
	set up the .env file 

        DB_CONNECTION=mysql

        DB_HOST=127.0.0.1

        DB_PORT=3306

        DB_DATABASE=LaravelArticleBlogProject

        DB_USERNAME=root

        DB_PASSWORD=root

        DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock 
        
        


- [x] API ==> Models

	For the model we need to run the migration in order for them to reach the database

	We have to instances : 

        Post : we need to add the following fields in the migration file (Title, Body, image, user_id)

        User : we need to add the following fields in the migration file (name, email, password)

	To create the model run the following command : 

        * php artisan make : model Post -m (It creates the Model and the migration)
	
	After creating the model and the migrations, you can run the migration : 

        * php artisan migrate

- [x] API ==> Model Relationships

    Create a method in the Post model ( user ) ==> Post belongsTo User

    Create a method in the User model ( posts ) ==> User hasMany Post

	
- [x] API ==> Controllers

	It dictates the logic, the way data must be saved, retrieved, updated, and delete
	to create controllers run the following command : 

        * php artisan make : controller PostControl - - resource (it creates the controller and the resources including index, store, edit, update, delete)

        * php artisan make : controller PageControl 


- [x] API ==> Routes

    The routes are : 

        Route :: get(“/“, PageContrroller@index);

        Route :: get(“/“, PageContrroller@about);

        Route :: resource(“posts”, PostsController);



- [x] MIDDLEWARE ==> Auth

	To enable authentication in Laravel you can simply run the following command : 

        * php artisan make:auth 

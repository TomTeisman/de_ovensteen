# De ovensteen #
De ovensteen is a project for development and testing a 'Laravel like' framework build in php.

## Description ##
De ovensteen is a laravel like framework build in php. It is build to be able to use the MVC model with as much plain php for the rest. If you want a more refined framework with a lot more posibilities, please check out [Laravel](https://laravel.com/docs/master).

## Installation ##
To start working on this project follow the following steps:
1. clone this project to a local repository.
2. install the composer autoloader.
```bash
composer install
```
3. copy or rename the config.example.php file to config.php and fill it with the correct data.
4. run the migrations and seeders.
```bash
php artisan migrate:fresh --seed
```

## Usage ##
1. start the application
```bash
php artisan serve
```
2. see result at [localhost:8000](http://localhost:8000) in your browser.

## Contact ##
For any questions, please contact [tjg.teisman@gmail.com](mailto:tjg.teisman@gmail.com).

## Versions ##
PHP: 8.2.0
MySQL: 8.0.31
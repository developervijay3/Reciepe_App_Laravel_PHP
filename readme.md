# Recipe Service


## How to use

* System Requirement: Apache2, PHP (7.1.x or higher), MySQL (5.x or higher), composer
* create an empty database named `recipe` or something else of your choice
* update `.env` file with your database details
* run `composer update` from your root directory 
* run `php artisan migrate`

## Start server

`
php -S localhost:8000 -t public
`

## Postman
you can import Recipes App.postman_collection.json
and starting using it.

## Executing Test Cases

`
php artisan db:wipe | php artisan migrate`

`
vendor/bin/phpunit
`

output will be 
PHPUnit 8.3.5 by Sebastian Bergmann and contributors.

............                                                      12 / 12 (100%)

Time: 218 ms, Memory: 14.00 MB

OK (12 tests, 21 assertions)

# Laravel Lumen PHP Framework

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.


## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

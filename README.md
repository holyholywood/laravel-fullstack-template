Just don't forget to install php and js package, set env and migrate database

# Installation

1. run `composer install`
2. run `npm install`
3. setup your .env file
4. create database
5. migrate database with `php artisan migrate`
6. connect storage to public folder to turn on media functionality
   `php artisan storage:link`
7. and Start server with double terminal using `php artisan serve` and `npm run dev`

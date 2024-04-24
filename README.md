## Prerequisites
1. Install XAMPP or Laragon
2. If use XAMPP, install Composer: https://getcomposer.org/download/

## Installation
1. git clone
2. In  terminal run `composer install`
4. Copy `.env.example` to `.env`
5. Update 'DB_PASSWORD' in .env file, if you set password for SQL.
6. In  terminal run `php artisan key:generate`
7. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
8. Start XAMPP Apache
9. Run `php artisan serve` and open the provided link

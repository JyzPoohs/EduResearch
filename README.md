## Prerequisites
1. Install XAMPP or Laragon
2. If use XAMPP, install Composer: https://getcomposer.org/download/

## Installation
1. Type "git clone https://github.com/JyzPoohs/EduResearch." to copy file to XAMPP htdocs folder. 
2. In htdocs, switch to "EduResearch",
3. In "EduResearch", open terminal (git bash or cmd), run `composer install`
4. Open the whole "EduResearch" folder in VS Code, copy `.env.example` and change name to `.env`
5. Update 'DB_PASSWORD' in .env file, if you set password for SQL.
6. In  terminal run `php artisan key:generate`
7. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
8. Start XAMPP Apache
9. Run `php artisan serve` and open the provided link

### Admin: 
- email: admin@softui.com
- password: secret

### Lecturer 
- email: lec@gmail.com
- password: password

### Student 
- email: stu@gmail.com
- password: password

# Creiden Laravel Task
### php version: 8.1.6
### laravel version: 9.48.0
## Installation
### make env file
```bash
cp .env.example .env
```
### set database credentials in .env file
### set wordpress application url in .env file (WORDPRESS_URL)

### generate key
```bash
php artisan key:generate
```
### Composer
```bash
composer install
```
### Database
```bash
php artisan migrate --seed
```
### Run
```bash
php artisan serve
```
access the application at http://localhost:8000
### user login
http://localhost:8000/login
```bash
email:user@mail.com
password:12345678
```
### admin login
http://localhost:8000/admin/login
```bash
email:admin@mail.com
password:12345678
```



# Movies
A web application developed by `Cristian Dinu (Student ID: U1976707)` using Laravel to illustrate CRUD operations on a single model.

## Environment and Configuration
```
$ composer update
$ cp .env.example .env
```

The following settings are required:
* A PHP web server. For example, [Apache HTTP Server](https://httpd.apache.org/).
* A database connection, with username and password. For exmaple, [MySQL](https://www.mysql.com/) or [MariaDB](https://mariadb.org/).
* [XAMPP](https://www.apachefriends.org/index.html) is recommended because it includes Apache HTTP Server, MySQL database, MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages.

## Packages
* [Tailwind CSS](https://tailwindcss.com/)
* [xylis/faker-cinema-providers](https://packagist.org/packages/xylis/faker-cinema-providers)

## Icons and Images
* [heroicons](https://heroicons.com/)
* [Lorem Picsum](https://picsum.photos/)

## Initialisation
```
$ php artisan key:generate
$ php artisan migrate:fresh --seed
```

## Startup
```
$ php artisan serve
```

The `Movies` web application will be available at the displayed URI.

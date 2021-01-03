# Movies
A web application developed by `Cristian Dinu (Student ID: U1976707)` using [Laravel](https://laravel.com/) to illustrate CRUD operations on a single model.
The web application is accessible to people with disabilities, is internationalised and works on mobile devices.
It demonstrates extensive innovation in implementing advanced and complex features of the web development framework.

## Environment and Configuration
```
$ composer update
$ cp .env.example .env
```

The following settings are required:
* A PHP web server. For example, [Apache HTTP Server](https://httpd.apache.org/).
* A database connection, with username and password. For example, [MySQL](https://www.mysql.com/) or [MariaDB](https://mariadb.org/).
* [XAMPP](https://www.apachefriends.org/index.html) is recommended because it includes Apache HTTP Server, MySQL database, MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages.
* Accounts on [Google](https://www.google.com/), [GitHub](https://github.com/) and [Mailtrap](https://mailtrap.io/).

Set the following variables in the `.env` file:
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_CALLBACK_URL=

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_CALLBACK_URL=
```

## Packages
* [Tailwind CSS](https://tailwindcss.com/)
* [Multi select alpine js](https://tailwindcomponents.com/component/multi-select-alpine-js) 
* [spatie/laravel-query-builder](https://packagist.org/packages/spatie/laravel-query-builder) 
* [xylis/faker-cinema-providers](https://packagist.org/packages/xylis/faker-cinema-providers)
* [stichoza/google-translate-php](https://packagist.org/packages/stichoza/google-translate-php)

## Services
* [Mailtrap](https://mailtrap.io/)

## Icons and Images
* [heroicons](https://heroicons.com/)
* [iconify](https://iconify.design/) 
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

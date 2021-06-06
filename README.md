# Web GIS Job
> Build based on [Laravel v8](https://laravel.com)


## Prerequisites

- PHP (8)

## Setup
1. Clode this repository
```sh
$ git clone https://github.com/akhmadrizki/lara-map.git
```
2. Copy file `.env.example` to `.env`
3. Install all package
```sh
$ composer install
```

## Running the app

```sh
$ php artisan serve
```

## Database setup

```sh
...
DB_DATABASE=lara_map
DB_USERNAME=root
DB_PASSWORD=
...
```

- Run this command:
```sh
$ php artisan key:generate
$ composer dump-autoload
$ php artisan migrate:fresh --seed
$ php artisan storage:link
```

# Movie API

## Project setup

Copy the `.env.example` file to `.env` and fill in the values

```bash
cp .env.example .env
```

or

```bash
copy .env.example .env
```

install the dependencies

```bash
composer install
```

generate the application key

```bash
php artisan key:generate
```

Create a new database using PostgreSQL and set the database configuration in the `.env` file

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=<NAME
DB_USERNAME=<USER>
DB_PASSWORD=<PASSWORD>
```

Run the migrations

```bash
php artisan migrate:fresh --seed
```

Start the server

```bash
php artisan serve
```

## API Documentation

Open the following URL in your browser

```bash
http://localhost:8000/docs/api
```

or

Import the `Movie API.postman_collection.json` file in `api_collection/` into Postman

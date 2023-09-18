# Backend LARAVEL

## Install dependences

- $ cd backend
- $ composer install

## Create `.env`

- $ cp .env.example .env

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

## Run Laravel Sail

- $ ./vendor/bin/sail up
  or on background with
- $ ./vendor/bin/sail up -d

## Migrations et Seeders

- $ ./vendor/bin/sail artisan migrate:fresh --seed

# Frontend VUEJS

- $ cd frontend
- $ npm install
- $ npm run serve

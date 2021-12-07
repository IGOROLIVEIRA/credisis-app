

## Configuring and running
    `cp env.example .env`
    `docker-compose up -d`

## Running migrations (inside the *_app container)
    `php artisan migrate`
### To clear database and run all (inside the *_app container)
    `php artisan migrate:fresh`

## Running Seeders (inside the *_app container)
    `php artisan db:seed` 
    
## Starting queue to listen (inside the *_app container)
    `php artisan queue:listen`

## Running tests (inside the *_app container)
    `php artisan test --filter Transfer`

## Stopping containers
    `docker-compose down`

## Endpoint for api
- Import the file Insomnia.json in Insomina for access valid endpoints 

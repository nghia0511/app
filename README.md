## How to run

1. clone source and install docker
2. composer install
3. cp .env.example .env
4. ./vendor/bin/sail up -d
6. ./vendor/bin/sail php artisan migrate
7. ./vendor/bin/sail php artisan db:seed

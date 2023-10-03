# github-actions-search-ce

> GitHub Actionsを検証する試み

# Usage(初回)

```
cp .env.example .env
docker-compose up -d
docker exec -it app sh
composer clear-cache
composer install
php artisan key:generate --force
php artisan cache:clear
php artisan config:clear
```




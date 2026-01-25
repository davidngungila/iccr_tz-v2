# Production Server Fix - Route Cache Issue

## Problem
If you see `Route [admin.slides.index] not defined` error, it means the route cache needs to be cleared on the production server.

## Solution

SSH into your production server and run:

```bash
cd /path/to/your/project
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan route:cache
```

Or if you want to avoid caching (recommended for development):

```bash
php artisan route:clear
php artisan config:clear
php artisan cache:clear
```

## After Pulling Latest Changes

Always run these commands after pulling new code:

```bash
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
npm run build
php artisan optimize
```

## Verify Routes

To verify routes are working:

```bash
php artisan route:list --name=slides
```

You should see:
- `admin.slides.index`
- `admin.slides.create`
- `admin.slides.store`
- `admin.slides.edit`
- `admin.slides.update`
- `admin.slides.delete`



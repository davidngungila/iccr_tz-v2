# Fix: /admin/slides Not Working on Live Server

## Problem
The `/admin/slides` route works on localhost but fails on the live server. This is a **route cache issue**.

## Quick Fix (Run on Production Server)

SSH into your production server and run these commands:

```bash
# Navigate to your project directory
cd /path/to/your/project/public_html  # or wherever your Laravel project is

# Clear all caches
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Verify routes exist
php artisan route:list --name=slides
```

You should see all 6 slides routes:
- `admin.slides.index`
- `admin.slides.create`
- `admin.slides.store`
- `admin.slides.edit`
- `admin.slides.update`
- `admin.slides.delete`

## Complete Deployment Steps

After pulling the latest code, **ALWAYS** run:

```bash
# 1. Pull latest code
git pull origin main

# 2. Install dependencies
composer install --no-dev --optimize-autoloader

# 3. Run migrations (if any)
php artisan migrate --force

# 4. Clear ALL caches (CRITICAL!)
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# 5. Build frontend assets
npm run build

# 6. Optimize (optional)
php artisan optimize
```

## Why This Happens

Laravel caches routes in production for performance. When you add new routes:
1. The routes are defined in `routes/web.php` ✅
2. But Laravel uses the **cached** routes file
3. The cache doesn't include your new routes ❌
4. Solution: Clear the cache so Laravel rebuilds it ✅

## Prevention

Add this to your deployment script or run it automatically after `git pull`:

```bash
php artisan route:clear && php artisan config:clear && php artisan cache:clear
```

## Still Not Working?

If clearing caches doesn't work:

1. **Check if routes file is updated:**
   ```bash
   cat routes/web.php | grep slides
   ```
   Should show the slides routes.

2. **Check if controller method exists:**
   ```bash
   grep -n "carouselSlides" app/Http/Controllers/AdminController.php
   ```

3. **Check Laravel version:**
   ```bash
   php artisan --version
   ```

4. **Check file permissions:**
   ```bash
   ls -la bootstrap/cache/
   ```
   Make sure Laravel can write to cache directory.



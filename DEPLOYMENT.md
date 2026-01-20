# Production Deployment Guide

## Steps to Deploy to Production Server

### 1. Pull Latest Changes
```bash
git pull origin main
```

### 2. Install/Update Dependencies
```bash
# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies
npm install

# Build frontend assets for production
npm run build
```

### 3. Run Migrations
```bash
php artisan migrate --force
```

### 4. Clear All Caches
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan optimize:clear
```

### 5. Optimize for Production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 6. Set Permissions (if needed)
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 7. Verify Assets
Make sure these files exist:
- `public/build/manifest.json`
- `public/build/assets/app-*.js`
- `public/build/assets/app-*.css`

## Quick Deployment Script

Run this single command for complete deployment:

```bash
git pull origin main && \
composer install --no-dev --optimize-autoloader && \
npm install && \
npm run build && \
php artisan migrate --force && \
php artisan optimize:clear && \
php artisan config:cache && \
php artisan route:cache && \
php artisan view:cache && \
php artisan optimize
```

## Troubleshooting

### If assets are not loading:
1. Check if `public/build/manifest.json` exists
2. Run `npm run build` again
3. Clear browser cache
4. Check file permissions on `public/build/` directory

### If styles are broken:
1. Ensure Tailwind CSS is compiled: `npm run build`
2. Check browser console for 404 errors
3. Verify Vite manifest is generated

### If JavaScript is not working:
1. Check browser console for errors
2. Verify `resources/js/app.js` is included
3. Run `npm run build` to compile assets


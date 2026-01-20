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

### If layout is not well arranged / styles are broken:

**CRITICAL: This is usually because assets aren't compiled. Follow these steps:**

1. **SSH into your production server**
2. **Navigate to your project directory**
3. **Run these commands in order:**

```bash
# Step 1: Install Node.js dependencies (if not already done)
npm install

# Step 2: Build assets (THIS IS THE MOST IMPORTANT STEP!)
npm run build

# Step 3: Verify the build was successful
ls -la public/build/

# You should see:
# - manifest.json
# - assets/ directory with CSS and JS files

# Step 4: Clear all Laravel caches
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Step 5: Set proper permissions (if needed)
chmod -R 755 public/build
chown -R www-data:www-data public/build
```

### If assets are not loading:
1. Check if `public/build/manifest.json` exists
2. Run `npm run build` again
3. Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)
4. Check file permissions on `public/build/` directory
5. Check server error logs: `tail -f storage/logs/laravel.log`

### If styles are still broken after building:
1. Check browser console (F12) for 404 errors
2. Verify Vite manifest is generated: `cat public/build/manifest.json`
3. Check if CSS file exists: `ls -la public/build/assets/*.css`
4. Try hard refresh: Ctrl+F5 or Cmd+Shift+R
5. Check `.env` file - ensure `APP_ENV=production` and `APP_DEBUG=false`

### If JavaScript is not working:
1. Check browser console for errors
2. Verify `resources/js/app.js` is included
3. Run `npm run build` to compile assets
4. Check if JS file exists: `ls -la public/build/assets/*.js`

### If npm is not available on production server:

**Option 1: Build locally and commit**
```bash
# On your local machine:
npm run build
git add public/build/
git commit -m "Add compiled production assets"
git push

# Then on production:
git pull origin main
```

**Option 2: Use a build server or CI/CD**
- Set up GitHub Actions or similar CI/CD to build assets automatically
- Or use a staging server to build, then transfer files

### Quick Diagnostic Commands:

```bash
# Check if manifest exists
test -f public/build/manifest.json && echo "✓ Manifest exists" || echo "✗ Manifest missing - run npm run build"

# Check if assets directory exists
test -d public/build/assets && echo "✓ Assets directory exists" || echo "✗ Assets missing - run npm run build"

# Check file permissions
ls -la public/build/

# Check Laravel config
php artisan config:show app.env
```


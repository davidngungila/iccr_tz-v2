# Fix Git Merge Conflict on Production Server

If you're getting this error when pulling:
```
error: Your local changes to the following files would be overwritten by merge:
        composer.json
        composer.lock
```

## Solution 1: Stash Local Changes (Recommended)

This saves your local changes temporarily, pulls the updates, then you can decide what to do:

```bash
# Save your local changes
git stash

# Pull the latest changes
git pull origin main

# If you need your local changes back, restore them:
# git stash pop

# If you don't need them, just discard:
# git stash drop
```

## Solution 2: Discard Local Changes (If you don't need them)

If the local changes to composer.json and composer.lock are not important:

```bash
# Discard local changes to these files
git checkout -- composer.json composer.lock

# Pull the latest changes
git pull origin main
```

## Solution 3: Commit Local Changes First

If you want to keep your local changes:

```bash
# Add and commit your local changes
git add composer.json composer.lock
git commit -m "Local composer changes"

# Pull the latest changes (may create a merge commit)
git pull origin main

# Resolve any conflicts if they occur
```

## After Pulling - Install Dependencies

After successfully pulling, make sure to install the new DomPDF package:

```bash
# Install/update composer dependencies
composer install --no-dev --optimize-autoloader

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Recommended Approach

For production, I recommend **Solution 2** (discard local changes) since we want the latest version with DomPDF:

```bash
git checkout -- composer.json composer.lock
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```



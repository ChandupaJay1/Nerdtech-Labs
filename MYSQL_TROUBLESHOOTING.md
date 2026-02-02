# MySQL Connection Troubleshooting Guide

## Error: Access denied for user 'root'@'localhost'

This error means MySQL is rejecting the connection. Here's how to fix it:

---

## Step 1: Check if MySQL is Running

1. Open **XAMPP Control Panel**
2. Check if **MySQL** has a green "Running" status
3. If not, click **Start** next to MySQL

---

## Step 2: Find Your MySQL Password

### Method A: Test Common Passwords

Open **XAMPP Shell** (click Shell button in XAMPP Control Panel) and try:

```bash
# Try with no password (just press Enter when prompted)
mysql -u root -p

# Or try these common passwords:
# - root
# - password
# - admin
# - (blank - just press Enter)
```

### Method B: Check phpMyAdmin

1. Open browser: `http://localhost/phpmyadmin`
2. If it opens without asking for password, your password is **blank**
3. If it asks for login, try username: `root` with common passwords above

---

## Step 3: Update .env File

Once you know your password, update the `.env` file:

### If NO password (blank):
```env
DB_PASSWORD=
```

### If password is "root":
```env
DB_PASSWORD=root
```

### If password is something else:
```env
DB_PASSWORD=your_actual_password
```

---

## Step 4: Clear Config Cache

After updating `.env`, always run:
```bash
php artisan config:clear
```

---

## Step 5: Create Database

Before running migrations, create the database:

### Option A: Using phpMyAdmin
1. Go to `http://localhost/phpmyadmin`
2. Click "New" in left sidebar
3. Database name: `nerdtech_labs`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Option B: Using MySQL Command
```bash
# In XAMPP Shell
mysql -u root -p
# Enter your password

# Then run:
CREATE DATABASE nerdtech_labs CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

---

## Step 6: Run Migrations

```bash
php artisan migrate:fresh
php artisan db:seed
```

---

## Common Issues & Solutions

### Issue 1: "Database does not exist"
**Solution:** Create the database first (see Step 5)

### Issue 2: "Access denied"
**Solution:** Wrong password in `.env` (see Step 2 & 3)

### Issue 3: "Connection refused"
**Solution:** MySQL not running (see Step 1)

### Issue 4: Still not working?
**Solution:** Try using `127.0.0.1` instead of `localhost`:
```env
DB_HOST=127.0.0.1
```

---

## Quick Reset MySQL Password (if needed)

If you want to reset MySQL password to blank:

1. Stop MySQL in XAMPP
2. Edit `C:\xampp\mysql\bin\my.ini`
3. Add under `[mysqld]`:
   ```
   skip-grant-tables
   ```
4. Start MySQL
5. Open XAMPP Shell:
   ```bash
   mysql -u root
   USE mysql;
   UPDATE user SET Password=PASSWORD('') WHERE User='root';
   FLUSH PRIVILEGES;
   exit;
   ```
6. Remove `skip-grant-tables` from `my.ini`
7. Restart MySQL

---

## Test Connection

To test if your database connection works:

```bash
php artisan tinker
DB::connection()->getPdo();
```

If you see a PDO object, connection is successful!

---

## Need Help?

1. Check XAMPP MySQL error log: `C:\xampp\mysql\data\mysql_error.log`
2. Check Laravel log: `storage/logs/laravel.log`
3. Ensure XAMPP MySQL is running on port 3306

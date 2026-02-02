# Database Setup Instructions

## Step 1: Create MySQL Database

Please create the MySQL database manually using one of these methods:

### Option A: Using phpMyAdmin (Recommended for XAMPP)
1. Open your browser and go to `http://localhost/phpmyadmin`
2. Click on "New" in the left sidebar
3. Enter database name: `nerdtech_labs`
4. Select collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Option B: Using MySQL Command Line
If you have MySQL in your PATH, run:
```bash
mysql -u root -e "CREATE DATABASE IF NOT EXISTS nerdtech_labs CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

## Step 2: Run Migrations and Seeders

After creating the database, run these commands in order:

```bash
# Fresh migration (this will drop all tables and recreate them)
php artisan migrate:fresh

# Run seeders to populate test data
php artisan db:seed
```

## Step 3: Access Admin Panel

**Admin Credentials:**
- Email: `admin@nerdtech.com`
- Password: `password123`

**Admin URL:** `http://localhost:8000/login`

After logging in, you'll be redirected to the admin dashboard where you can manage:
- Services
- Projects

## Database Structure

The database includes:
- **users** - Admin and user accounts
- **services** - Service listings with icons and descriptions
- **projects** - Project portfolio items
- **sessions** - User sessions
- **cache** - Application cache
- **jobs** - Background jobs queue

## Test Data Included

### Services (6 items):
1. Web Development
2. Cloud Solutions
3. Cyber Security
4. Data Analytics
5. Software Development
6. Digital Marketing

### Projects (6 items):
1. E-Commerce Platform
2. Mobile Banking App
3. Cloud Infrastructure
4. Data Analytics Dashboard
5. CRM System
6. Digital Marketing Campaign

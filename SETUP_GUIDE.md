# Nerdtech Labs - Complete Setup Guide

## Prerequisites
- XAMPP installed and running (Apache & MySQL)
- PHP 8.1 or higher
- Composer installed

## Step-by-Step Setup

### 1. Create MySQL Database

**Option A: Using phpMyAdmin (Recommended)**
1. Open browser: `http://localhost/phpmyadmin`
2. Click "New" in the left sidebar
3. Database name: `nerdtech_labs`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

**Option B: Using Command Line**
If MySQL is in your PATH:
```bash
mysql -u root -e "CREATE DATABASE nerdtech_labs CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 2. Run Database Migrations

Open terminal in project directory and run:

```bash
# Run migrations (create all tables)
php artisan migrate:fresh
```

### 3. Seed Database with Test Data

```bash
# Populate database with test data
php artisan db:seed
```

This will create:
- 1 Admin user
- 6 Services (Web Development, Cloud Solutions, Cyber Security, Data Analytics, Software Development, Digital Marketing)
- 6 Projects (E-Commerce Platform, Mobile Banking App, Cloud Infrastructure, etc.)

### 4. Start Development Server

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

## Admin Access

### Login Credentials
- **URL**: `http://localhost:8000/login`
- **Email**: `admin@nerdtech.com`
- **Password**: `password123`

### Admin Features
After logging in, you can:
- View Dashboard with statistics
- Manage Services (Create, Read, Update, Delete)
- Manage Projects (Create, Read, Update, Delete)
- Upload project images

## Database Configuration

The `.env` file has been updated with MySQL settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nerdtech_labs
DB_USERNAME=root
DB_PASSWORD=
```

## Test Data Included

### Services (6 items)
1. **Web Development** - Custom website design and web applications
2. **Cloud Solutions** - Cloud migration and infrastructure
3. **Cyber Security** - Security audits and monitoring
4. **Data Analytics** - Business intelligence and analytics
5. **Software Development** - Custom software solutions
6. **Digital Marketing** - SEO and social media marketing

### Projects (6 items)
1. **E-Commerce Platform** - Modern e-commerce solution
2. **Mobile Banking App** - Secure banking application
3. **Cloud Infrastructure** - Scalable cloud setup
4. **Data Analytics Dashboard** - Real-time analytics
5. **CRM System** - Customer relationship management
6. **Digital Marketing Campaign** - Multi-channel campaign

## Admin Panel Routes

- Dashboard: `/admin/dashboard`
- Services List: `/admin/services`
- Add Service: `/admin/services/create`
- Edit Service: `/admin/services/{id}/edit`
- Projects List: `/admin/projects`
- Add Project: `/admin/projects/create`
- Edit Project: `/admin/projects/{id}/edit`

## Troubleshooting

### Migration Issues
If you encounter migration errors:
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear

# Try migration again
php artisan migrate:fresh --seed
```

### Database Connection Error
- Ensure XAMPP MySQL is running
- Check database name in `.env` matches created database
- Verify MySQL credentials (default: root with no password)

### Permission Issues
If you get storage permission errors:
```bash
# Windows PowerShell
icacls storage /grant Users:F /T
icacls bootstrap/cache /grant Users:F /T
```

## Next Steps

1. ✅ Database configured with MySQL
2. ✅ Migrations created
3. ✅ Seeders ready with test data
4. ✅ Admin panel fully functional
5. ✅ Modern login UI implemented
6. ✅ Models configured with fillable fields

Now you can:
- Log in to admin panel
- Manage services and projects
- View changes on the public website
- Add your own content

## Support

For issues or questions, check:
- Laravel Documentation: https://laravel.com/docs
- Project README: README.md

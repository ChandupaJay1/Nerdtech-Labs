# Nerdtech Labs - Quick Setup Script
# Run this after creating the MySQL database

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Nerdtech Labs - Database Setup" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Check if database exists
Write-Host "Step 1: Checking database connection..." -ForegroundColor Yellow
php artisan config:clear
php artisan cache:clear

Write-Host ""
Write-Host "Step 2: Running migrations..." -ForegroundColor Yellow
php artisan migrate:fresh

if ($LASTEXITCODE -eq 0) {
    Write-Host "✓ Migrations completed successfully!" -ForegroundColor Green
    
    Write-Host ""
    Write-Host "Step 3: Seeding database with test data..." -ForegroundColor Yellow
    php artisan db:seed
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✓ Database seeded successfully!" -ForegroundColor Green
        
        Write-Host ""
        Write-Host "========================================" -ForegroundColor Green
        Write-Host "  Setup Complete!" -ForegroundColor Green
        Write-Host "========================================" -ForegroundColor Green
        Write-Host ""
        Write-Host "Admin Login Credentials:" -ForegroundColor Cyan
        Write-Host "  Email: admin@nerdtech.com" -ForegroundColor White
        Write-Host "  Password: password123" -ForegroundColor White
        Write-Host ""
        Write-Host "Test Data Created:" -ForegroundColor Cyan
        Write-Host "  - 6 Services" -ForegroundColor White
        Write-Host "  - 6 Projects" -ForegroundColor White
        Write-Host ""
        Write-Host "Access admin panel at:" -ForegroundColor Cyan
        Write-Host "  http://localhost:8000/login" -ForegroundColor White
        Write-Host ""
    } else {
        Write-Host "✗ Seeding failed!" -ForegroundColor Red
        Write-Host "Please check the error messages above." -ForegroundColor Red
    }
} else {
    Write-Host "✗ Migration failed!" -ForegroundColor Red
    Write-Host "Please ensure:" -ForegroundColor Yellow
    Write-Host "  1. MySQL database 'nerdtech_labs' exists" -ForegroundColor White
    Write-Host "  2. XAMPP MySQL is running" -ForegroundColor White
    Write-Host "  3. Database credentials in .env are correct" -ForegroundColor White
}

Write-Host ""
Write-Host "Press any key to continue..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")

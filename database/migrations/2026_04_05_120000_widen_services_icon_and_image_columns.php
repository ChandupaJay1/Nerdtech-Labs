<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement('ALTER TABLE `services` MODIFY `icon` VARCHAR(512) NULL');
        DB::statement('ALTER TABLE `services` MODIFY `image` VARCHAR(512) NULL');
    }

    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement('ALTER TABLE `services` MODIFY `icon` VARCHAR(255) NULL');
        DB::statement('ALTER TABLE `services` MODIFY `image` VARCHAR(255) NULL');
    }
};

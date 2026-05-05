<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('interest_subsidies')) {
            try { DB::statement('ALTER TABLE interest_subsidies DROP PRIMARY KEY'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE interest_subsidies MODIFY COLUMN `id` BIGINT UNSIGNED NOT NULL'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE interest_subsidies MODIFY COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE interest_subsidies ADD PRIMARY KEY (`id`)'); } catch (\Throwable $e) {}
        }

        if (Schema::hasTable('fci_subsidies')) {
            try { DB::statement('ALTER TABLE fci_subsidies DROP PRIMARY KEY'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE fci_subsidies MODIFY COLUMN `id` BIGINT UNSIGNED NOT NULL'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE fci_subsidies MODIFY COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE fci_subsidies ADD PRIMARY KEY (`id`)'); } catch (\Throwable $e) {}
        }
    }

    public function down(): void
    {
        // No down migration to avoid dropping primary keys inadvertently.
    }
};

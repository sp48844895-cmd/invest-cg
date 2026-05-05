<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        $tables = ['interest_subsidies','fci_subsidies'];
        foreach ($tables as $table) {
            if (!Schema::hasTable($table)) continue;

            // Ensure id exists with correct base type (no AI yet)
            try { DB::statement("ALTER TABLE {$table} MODIFY `id` BIGINT UNSIGNED NOT NULL"); } catch (\Throwable $e) {}

            // Try to drop any existing primary key (if it's not on `id`, next add will fail otherwise)
            try { DB::statement("ALTER TABLE {$table} DROP PRIMARY KEY"); } catch (\Throwable $e) {}

            // Ensure the primary key is on `id`
            try { DB::statement("ALTER TABLE {$table} ADD PRIMARY KEY (`id`)"); } catch (\Throwable $e) {}

            // Finally, make `id` AUTO_INCREMENT
            try { DB::statement("ALTER TABLE {$table} MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT"); } catch (\Throwable $e) {}
        }
    }

    public function down(): void
    {
        // No-op. We don't want to revert AUTO_INCREMENT/PK corrections.
    }
};

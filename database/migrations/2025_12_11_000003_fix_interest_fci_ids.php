<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('interest_subsidies')) {
            try {
                DB::statement('ALTER TABLE interest_subsidies MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
            } catch (\Throwable $e) {
                // silently ignore if it is already correct
            }
        }

        if (Schema::hasTable('fci_subsidies')) {
            try {
                DB::statement('ALTER TABLE fci_subsidies MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
            } catch (\Throwable $e) {
                // silently ignore if it is already correct
            }
        }
    }

    public function down(): void
    {
        // No-op: we don't want to revert AUTO_INCREMENT once fixed.
    }
};

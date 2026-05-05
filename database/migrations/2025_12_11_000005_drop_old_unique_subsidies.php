<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('interest_subsidies')) {
            try {
                $rows = DB::select("SHOW INDEX FROM interest_subsidies WHERE Key_name = 'ux_interest_master'");
                if (!empty($rows)) {
                    DB::statement('ALTER TABLE interest_subsidies DROP INDEX ux_interest_master');
                }
            } catch (\Throwable $e) {}
        }
        if (Schema::hasTable('fci_subsidies')) {
            try {
                $rows = DB::select("SHOW INDEX FROM fci_subsidies WHERE Key_name = 'ux_fci_master'");
                if (!empty($rows)) {
                    DB::statement('ALTER TABLE fci_subsidies DROP INDEX ux_fci_master');
                }
            } catch (\Throwable $e) {}
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('interest_subsidies')) {
            try {
                $rows = DB::select("SHOW INDEX FROM interest_subsidies WHERE Key_name = 'ux_interest_master'");
                if (empty($rows)) {
                    DB::statement('CREATE UNIQUE INDEX ux_interest_master ON interest_subsidies (enterprise_id, enterprise_level_id, area_group_id)');
                }
            } catch (\Throwable $e) {}
        }
        if (Schema::hasTable('fci_subsidies')) {
            try {
                $rows = DB::select("SHOW INDEX FROM fci_subsidies WHERE Key_name = 'ux_fci_master'");
                if (empty($rows)) {
                    DB::statement('CREATE UNIQUE INDEX ux_fci_master ON fci_subsidies (enterprise_id, enterprise_level_id, area_group_id)');
                }
            } catch (\Throwable $e) {}
        }
    }
};

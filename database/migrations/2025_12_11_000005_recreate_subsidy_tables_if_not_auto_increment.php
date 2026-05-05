<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private function idIsAutoIncrement(string $table): bool
    {
        try {
            $rows = DB::select("SHOW COLUMNS FROM `$table` LIKE 'id'");
            if (!$rows) return false;
            $extra = $rows[0]->Extra ?? '';
            return stripos($extra, 'auto_increment') !== false;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function up(): void
    {
        // interest_subsidies
        if (Schema::hasTable('interest_subsidies')) {
            $count = 0;
            try { $count = DB::table('interest_subsidies')->count(); } catch (\Throwable $e) {}
            $isAI = $this->idIsAutoIncrement('interest_subsidies');
            if (!$isAI && $count === 0) {
                Schema::drop('interest_subsidies');
                Schema::create('interest_subsidies', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('enterprise_id')->constrained('enterprises');
                    $table->foreignId('enterprise_level_id')->constrained('enterprise_levels');
                    $table->foreignId('area_group_id')->constrained('area_groups');
                    $table->string('policy_type', 32)->default('service');
                    $table->unsignedTinyInteger('interest_term_years');
                    $table->unsignedTinyInteger('interest_percentage');
                    $table->unsignedBigInteger('interest_max_limit_lakh');
                    $table->timestamps();
                    $table->unique(['enterprise_id','enterprise_level_id','area_group_id'], 'ux_interest_master');
                    $table->unique(['policy_type','enterprise_id','enterprise_level_id','area_group_id'], 'ux_interest_master2');
                });
            }
        }

        // fci_subsidies
        if (Schema::hasTable('fci_subsidies')) {
            $count = 0;
            try { $count = DB::table('fci_subsidies')->count(); } catch (\Throwable $e) {}
            $isAI = $this->idIsAutoIncrement('fci_subsidies');
            if (!$isAI && $count === 0) {
                Schema::drop('fci_subsidies');
                Schema::create('fci_subsidies', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('enterprise_id')->constrained('enterprises');
                    $table->foreignId('enterprise_level_id')->constrained('enterprise_levels');
                    $table->foreignId('area_group_id')->constrained('area_groups');
                    $table->string('policy_type', 32)->default('service');
                    $table->unsignedTinyInteger('fci_percentage');
                    $table->unsignedBigInteger('fci_max_limit_lakh');
                    $table->timestamps();
                    $table->unique(['enterprise_id','enterprise_level_id','area_group_id'], 'ux_fci_master');
                    $table->unique(['policy_type','enterprise_id','enterprise_level_id','area_group_id'], 'ux_fci_master2');
                });
            }
        }
    }

    public function down(): void
    {
        // No-op: do not drop/recreate back.
    }
};

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
        if (Schema::hasTable('interest_subsidies') && !$this->idIsAutoIncrement('interest_subsidies')) {
            $bak = 'interest_subsidies_bak_'.time();
            Schema::rename('interest_subsidies', $bak);

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

            $hasPolicy = Schema::hasColumn($bak, 'policy_type');
            try {
                $rows = DB::table($bak)->get();
                foreach ($rows as $r) {
                    DB::table('interest_subsidies')->insert([
                        'enterprise_id' => $r->enterprise_id,
                        'enterprise_level_id' => $r->enterprise_level_id,
                        'area_group_id' => $r->area_group_id,
                        'policy_type' => $hasPolicy ? ($r->policy_type ?? 'service') : 'service',
                        'interest_term_years' => $r->interest_term_years,
                        'interest_percentage' => $r->interest_percentage,
                        'interest_max_limit_lakh' => $r->interest_max_limit_lakh,
                        'created_at' => $r->created_at ?? now(),
                        'updated_at' => $r->updated_at ?? now(),
                    ]);
                }
            } catch (\Throwable $e) {
                // ignore copy issues; seeder will repopulate
            }

            Schema::dropIfExists($bak);
        }

        // fci_subsidies
        if (Schema::hasTable('fci_subsidies') && !$this->idIsAutoIncrement('fci_subsidies')) {
            $bak = 'fci_subsidies_bak_'.time();
            Schema::rename('fci_subsidies', $bak);

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

            $hasPolicy = Schema::hasColumn($bak, 'policy_type');
            try {
                $rows = DB::table($bak)->get();
                foreach ($rows as $r) {
                    DB::table('fci_subsidies')->insert([
                        'enterprise_id' => $r->enterprise_id,
                        'enterprise_level_id' => $r->enterprise_level_id,
                        'area_group_id' => $r->area_group_id,
                        'policy_type' => $hasPolicy ? ($r->policy_type ?? 'service') : 'service',
                        'fci_percentage' => $r->fci_percentage,
                        'fci_max_limit_lakh' => $r->fci_max_limit_lakh,
                        'created_at' => $r->created_at ?? now(),
                        'updated_at' => $r->updated_at ?? now(),
                    ]);
                }
            } catch (\Throwable $e) {
                // ignore copy issues; seeder will repopulate
            }

            Schema::dropIfExists($bak);
        }
    }

    public function down(): void
    {
        // No down migration; tables remain in proper shape.
    }
};

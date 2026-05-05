<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('divisions')) {
            Schema::create('divisions', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('districts')) {
            Schema::table('districts', function (Blueprint $table) {
                if (!Schema::hasColumn('districts', 'division_id')) {
                    $table->foreignId('division_id')->nullable()->after('name')->constrained('divisions')->nullOnDelete();
                }
            });
        }

        if (Schema::hasTable('sectors')) {
            Schema::table('sectors', function (Blueprint $table) {
                if (!Schema::hasColumn('sectors', 'policy_type')) {
                    $table->string('policy_type', 32)->default('manufacturing')->after('name');
                }
            });
        }

        if (Schema::hasTable('subsectors')) {
            Schema::table('subsectors', function (Blueprint $table) {
                if (!Schema::hasColumn('subsectors', 'service_conditions')) {
                    $table->text('service_conditions')->nullable()->after('min_capital_investment_lakh');
                }
                if (!Schema::hasColumn('subsectors', 'eligibility_rules_json')) {
                    $table->json('eligibility_rules_json')->nullable()->after('service_conditions');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('districts')) {
            Schema::table('districts', function (Blueprint $table) {
                if (Schema::hasColumn('districts', 'division_id')) {
                    try { $table->dropForeign(['division_id']); } catch (\Throwable $e) {}
                    try { $table->dropColumn('division_id'); } catch (\Throwable $e) {}
                }
            });
        }

        if (Schema::hasTable('subsectors')) {
            Schema::table('subsectors', function (Blueprint $table) {
                if (Schema::hasColumn('subsectors', 'eligibility_rules_json')) {
                    $table->dropColumn('eligibility_rules_json');
                }
                if (Schema::hasColumn('subsectors', 'service_conditions')) {
                    $table->dropColumn('service_conditions');
                }
            });
        }

        if (Schema::hasTable('sectors')) {
            Schema::table('sectors', function (Blueprint $table) {
                if (Schema::hasColumn('sectors', 'policy_type')) {
                    $table->dropColumn('policy_type');
                }
            });
        }

        Schema::dropIfExists('divisions');
    }
};

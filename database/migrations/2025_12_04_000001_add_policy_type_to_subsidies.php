<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('interest_subsidies', function (Blueprint $table) {
            if (!Schema::hasColumn('interest_subsidies', 'policy_type')) {
                $table->string('policy_type', 32)->default('service')->after('area_group_id');
            }
            // Add new unique including policy_type (retain old unique if present)
            $table->unique(['policy_type','enterprise_id','enterprise_level_id','area_group_id'], 'ux_interest_master2');
        });

        Schema::table('fci_subsidies', function (Blueprint $table) {
            if (!Schema::hasColumn('fci_subsidies', 'policy_type')) {
                $table->string('policy_type', 32)->default('service')->after('area_group_id');
            }
            $table->unique(['policy_type','enterprise_id','enterprise_level_id','area_group_id'], 'ux_fci_master2');
        });
    }

    public function down(): void
    {
        Schema::table('interest_subsidies', function (Blueprint $table) {
            try { $table->dropUnique('ux_interest_master2'); } catch (\Throwable $e) {}
            if (Schema::hasColumn('interest_subsidies', 'policy_type')) {
                $table->dropColumn('policy_type');
            }
        });
        Schema::table('fci_subsidies', function (Blueprint $table) {
            try { $table->dropUnique('ux_fci_master2'); } catch (\Throwable $e) {}
            if (Schema::hasColumn('fci_subsidies', 'policy_type')) {
                $table->dropColumn('policy_type');
            }
        });
    }
};

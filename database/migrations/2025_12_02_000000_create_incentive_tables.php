<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('districts')) {
            Schema::create('districts', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('area_groups')) {
            Schema::create('area_groups', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('blocks')) {
            Schema::create('blocks', function (Blueprint $table) {
                $table->id();
                $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
                $table->foreignId('area_group_id')->constrained('area_groups');
                $table->string('name');
                $table->timestamps();
                $table->unique(['district_id','name']);
            });
        }

        if (!Schema::hasTable('enterprises')) {
            Schema::create('enterprises', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('enterprise_levels')) {
            Schema::create('enterprise_levels', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('min_pm_lakh')->nullable();
                $table->unsignedBigInteger('max_pm_lakh')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('sectors')) {
            Schema::create('sectors', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('subsectors')) {
            Schema::create('subsectors', function (Blueprint $table) {
                $table->id();
                $table->foreignId('sector_id')->constrained('sectors')->cascadeOnDelete();
                $table->string('name');
                $table->boolean('is_thrust')->default(false);
                $table->unsignedBigInteger('min_capital_investment_lakh')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('interest_subsidies')) {
            Schema::create('interest_subsidies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enterprise_id')->constrained('enterprises');
            $table->foreignId('enterprise_level_id')->constrained('enterprise_levels');
            $table->foreignId('area_group_id')->constrained('area_groups');
            $table->unsignedTinyInteger('interest_term_years');
            $table->unsignedTinyInteger('interest_percentage');
            $table->unsignedBigInteger('interest_max_limit_lakh');
            $table->timestamps();
            $table->unique(['enterprise_id','enterprise_level_id','area_group_id'], 'ux_interest_master');
            });
        }

        if (!Schema::hasTable('fci_subsidies')) {
            Schema::create('fci_subsidies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enterprise_id')->constrained('enterprises');
            $table->foreignId('enterprise_level_id')->constrained('enterprise_levels');
            $table->foreignId('area_group_id')->constrained('area_groups');
            $table->unsignedTinyInteger('fci_percentage');
            $table->unsignedBigInteger('fci_max_limit_lakh');
            $table->timestamps();
            $table->unique(['enterprise_id','enterprise_level_id','area_group_id'], 'ux_fci_master');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('fci_subsidies');
        Schema::dropIfExists('interest_subsidies');
        Schema::dropIfExists('subsectors');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('enterprise_levels');
        Schema::dropIfExists('enterprises');
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('area_groups');
        Schema::dropIfExists('districts');
    }
};

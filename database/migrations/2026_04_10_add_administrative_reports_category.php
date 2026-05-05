<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add the new 'administrative_reports' category to the enum
        DB::statement("ALTER TABLE policy_documents MODIFY COLUMN category ENUM('acts', 'industrial_policy', 'policy_act', 'rules', 'administrative_reports')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the enum to its original state (remove administrative_reports)
        DB::statement("ALTER TABLE policy_documents MODIFY COLUMN category ENUM('acts', 'industrial_policy', 'policy_act', 'rules')");
    }
};

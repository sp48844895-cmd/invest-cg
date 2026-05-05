<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('policy_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['acts', 'industrial_policy', 'policy_act', 'rules'])->default('acts');
            $table->string('policy_period')->nullable()->comment('For industrial_policy category: 2024-30, 2019-24, etc.');
            $table->string('title');
            $table->string('file_path');
            $table->string('file_name')->nullable();
            $table->decimal('file_size', 10, 2)->comment('File size in MB');
            $table->date('published_date');
            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['category', 'is_active']);
            $table->index(['category', 'policy_period', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_documents');
    }
};






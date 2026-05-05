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
        Schema::create('contact_persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->string('category'); // e.g., 'dept-commerce', 'directorate', 'dtic'
            $table->string('location')->nullable(); // for dtic locations
            $table->text('sectors')->nullable(); // optional sectors info
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_persons');
    }
};

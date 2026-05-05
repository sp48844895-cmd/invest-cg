<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('question');
            $table->longText('answer');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();

            $table->index(['category', 'status']);
            $table->index(['status', 'display_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};

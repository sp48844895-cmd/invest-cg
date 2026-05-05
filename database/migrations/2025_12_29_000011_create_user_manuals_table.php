<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_manuals', function (Blueprint $table) {
            $table->id();
            $table->string('dept_name');
            $table->string('service_name');
            $table->string('type')->comment('Web / Mobile / Process / Other');
            $table->text('short_desc')->nullable();
            $table->string('pdf_file');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();

            $table->index(['dept_name', 'status']);
            $table->index(['service_name', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_manuals');
    }
};

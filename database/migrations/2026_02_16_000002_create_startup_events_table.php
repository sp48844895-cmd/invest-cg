<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('startup_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_type');
            $table->string('event_name');
            $table->date('event_date');
            $table->string('pre_event_promotion_path')->nullable();
            $table->string('pre_event_promotion_name')->nullable();
            $table->decimal('pre_event_promotion_size', 8, 2)->nullable();
            $table->string('post_event_report_path')->nullable();
            $table->string('post_event_report_name')->nullable();
            $table->decimal('post_event_report_size', 8, 2)->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startup_events');
    }
};

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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('title')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_url')->nullable();
            $table->string('youtube_id')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};

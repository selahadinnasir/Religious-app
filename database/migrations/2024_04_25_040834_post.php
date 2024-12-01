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
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('tag')->nullable();
            $table->string('author')->nullable();
            $table->enum('status', ['published', 'unpublished', 'draft'])->default('draft');
            $table->string('cover_image')->nullable();
            $table->string('document_file')->nullable();
            $table->string('video_file')->nullable();
            $table->string('external_content_url')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('posts');
    }
};

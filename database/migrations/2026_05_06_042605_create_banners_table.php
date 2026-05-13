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
        Schema::create('banners', function (Blueprint $blade) {
            $blade->id();
            $blade->string('title')->nullable();
            $blade->text('description')->nullable();
            $blade->string('image');
            $blade->string('link')->nullable();
            $blade->integer('order_priority')->default(0);
            $blade->boolean('is_active')->default(true);
            $blade->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};

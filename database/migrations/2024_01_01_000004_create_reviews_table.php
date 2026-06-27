<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned(); // 1-5
            $table->string('title')->nullable();
            $table->text('body');
            $table->enum('result_duration', [
                '1week', '2weeks', '1month', '3months', 'more'
            ])->nullable();
            $table->enum('skin_type', [
                'normal', 'dry', 'oily', 'mixed', 'sensitive'
            ])->nullable();
            $table->enum('hair_type', [
                'normal', 'dry', 'oily', 'curly', 'colored'
            ])->nullable();
            $table->boolean('would_recommend')->default(true);
            $table->boolean('verified')->default(false);
            $table->unsignedInteger('likes_count')->default(0); // cached
            $table->timestamps();

            // مراجعة واحدة فقط لكل مستخدم لكل منتج
            $table->unique(['user_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->change();

            $table->string('guest_name')->nullable()->after('product_id');
            $table->string('guest_email')->nullable()->after('guest_name');
            $table->string('guest_phone')->nullable()->after('guest_email');
            $table->string('guest_token')->nullable()->after('guest_phone');
            $table->string('ip_address', 45)->nullable()->after('guest_token');

            $table->boolean('is_approved')->default(false)->after('verified');

            $table->index(['product_id', 'is_approved']);
            $table->index(['product_id', 'guest_email']);
            $table->index(['product_id', 'guest_phone']);
            $table->index(['ip_address']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn([
                'guest_name',
                'guest_email',
                'guest_phone',
                'guest_token',
                'ip_address',
                'is_approved',
            ]);
            $table->foreignId('user_id')->nullable()->change();
            
        });
    }
};

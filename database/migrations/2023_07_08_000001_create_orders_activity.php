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
        Schema::create('order_activity', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('actor');
            $table->string('order_status_id');
            $table->string('description')->nullable();  // $table->timestamp('created_dtm')->now();
            $table->integer('sequence')->nullable();
            $table->timestamps();            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_activity');
    }
};

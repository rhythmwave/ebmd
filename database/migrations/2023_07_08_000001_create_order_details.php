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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('order_detail_type_id');
            $table->string('attachment')->nullable();
            $table->integer('code')->nullable();
            $table->string('description')->nullable();
            // $table->timestamp('created_dtm')->now();
            // $table->timestamp('updated_dtm')->nullable();
            $table->string('condition')->nullable();
            $table->string('xs1')->nullable();
            $table->integer('xn1')->nullable();
            $table->string('xd1')->nullable();
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
        Schema::dropIfExists('order_details');
    }
};

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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('starts_at');
            $table->dateTime('ends_at')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_cancelled')->default(false);
            $table->foreignId('city_id')->constrained()->restrictOnDelete();
            $table->string('location_details')->nullable();
            $table->integer('capacity')->default(100);
            $table->foreignId('membership_id')->nullable()->constrained()->nullOnDelete(); // Min tier
            $table->timestamps();
            
            $table->index(['city_id', 'starts_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

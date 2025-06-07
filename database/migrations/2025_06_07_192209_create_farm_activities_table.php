<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farm_activities', function (Blueprint $table) {
            $table->id();

            // Ensure foreign key column is UNSIGNED BIGINT to match farmers.id
            $table->unsignedBigInteger('farmer_id');
            $table->foreign('farmer_id')
                ->references('id')
                ->on('farmers')
                ->onDelete('cascade');

            // Optional: link to users table
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->foreign('assigned_to')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            // Activity details
            $table->string('activity_type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farm_activities');
    }
};

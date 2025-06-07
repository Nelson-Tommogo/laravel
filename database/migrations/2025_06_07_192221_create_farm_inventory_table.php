<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farm_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained()->onDelete('cascade');
            $table->string('item_name');
            $table->string('category')->comment('Seeds, Fertilizer, Equipment etc.');
            $table->decimal('quantity', 10, 2);
            $table->string('unit')->comment('kg, liters, pieces etc.');
            $table->decimal('unit_price', 12, 2)->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('storage_location')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('available')->comment('available, low_stock, out_of_stock');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farm_inventory');
    }
};
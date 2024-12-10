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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('medicine_name', 100);
            $table->unsignedBigInteger('category_id'); // Foreign key
            $table->integer('quantity')->default(0);
            $table->decimal('unit_price', 8, 2); // Precision of 8 digits, 2 after decimal
            $table->date('expiry_date');
            $table->string('manufacturer', 150)->nullable();
            $table->timestamps(); // Adds created_at and updated_at

            // Foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            // $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
        public function down(): void
        {
            Schema::dropIfExists('medicines');
        }
};

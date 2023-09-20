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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderType')->nullable();
            $table->string('patient')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('createdDate')->default(now());
            $table->text('samples')->nullable();
            $table->string('dni')->nullable();
            $table->boolean('discarded')->default(false);
            $table->jsonb('labTestGroups')->nullable();
            $table->text('prices')->nullable();
            $table->decimal('tax', 8, 2)->default(0.00);
            $table->text('alicuota')->nullable();
            $table->text('plaquetas')->nullable();
            $table->text('valordiuresis')->nullable();
            $table->boolean('IVA',)->default(0.00);
            $table->string('barcode', 8)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

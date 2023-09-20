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
        Schema::create('labtestgroup', function (Blueprint $table) {
            $table->id();
            $table->date('createdDate');
            $table->string('codigo');
            $table->string('name');
            $table->text('method');
            $table->string('processdays');
            $table->string('report');
            $table->string('storage');
            $table->string('instrument');
            $table->string('sample');
            $table->string('specialty');
            $table->text('instructions');
            $table->string('interferences');
            $table->string('reference_value');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labtetgroup');
    }
};

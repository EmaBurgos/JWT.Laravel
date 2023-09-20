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
             Schema::table('users', function (Blueprint $table) {
            $table->string('emailPay')->nullable()->change();;
            $table->string('street')->nullable()->change();;
            $table->string('state')->nullable()->change();;
            $table->string('zipcode')->nullable()->change();;
            $table->string('phone')->nullable()->change();;
            $table->string('cuit')->nullable()->change();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

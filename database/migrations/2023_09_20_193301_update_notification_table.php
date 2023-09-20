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
            Schema::table('notification', function (Blueprint $table) {
            $table->date('createdDate')->default(now())->change();
            $table->string('title')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->text('description')->nullable()->change(); 
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

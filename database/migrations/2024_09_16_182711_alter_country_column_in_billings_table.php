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
        Schema::table('billings', function (Blueprint $table) {
            // Set a default value for the 'country' column
            $table->string('country')->default('Nigeria')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('billings', function (Blueprint $table) {
           // Here, we are assuming 'country' was nullable before. Adjust if necessary.
           $table->string('country')->nullable()->change();
        });
    }
};

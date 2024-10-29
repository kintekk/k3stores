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
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal', 10, 2); // Precision 10, Scale 2
            $table->decimal('discount', 10, 2)->default(0); // Precision 10, Scale 2
            $table->decimal('tax', 10, 2); // Precision 10, Scale 2
            $table->decimal('total', 10, 2); // Precision 10, Scale 2
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->string('line1')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->enum('status',['ordered', 'delivered','canceled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('delivered_date')->nullable();
            $table->date('canceled_date')->nullable();
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

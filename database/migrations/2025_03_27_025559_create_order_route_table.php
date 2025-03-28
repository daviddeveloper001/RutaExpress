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
        Schema::create('order_route', function (Blueprint $table) {
            $table->foreignUuid('order_id')->constrained('orders');  
            $table->foreignUuid('route_id')->constrained('routes');  
            $table->integer('delivery_order');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_route');
    }
};

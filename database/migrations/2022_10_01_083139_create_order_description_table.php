<?php

use App\Models\Food;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_descriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('order_quantity');
            $table->integer('order_status')->default(0);
            $table->text('order_request')->nullable();
            $table->double('order_price');
            $table->foreignIdFor(Order::class);
            $table->foreignIdFor(Food::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_descriptions');
    }
};

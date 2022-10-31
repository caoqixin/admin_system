<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('order_id')->comment('订单id');
            $table->string('product_name')->comment('商品名称');
            $table->string('contact_name')->comment('联系人');
            $table->string('phone_number')->comment('联系号码');
            $table->tinyInteger('status')->comment('0: pending, 1: ordered, 2: completed, 3: closed');
            $table->foreignIdFor(\App\Models\Supplier::class, 'supplier_id');
            $table->decimal('deposit')->comment('押金')->nullable();
            $table->decimal('price')->comment('价格');
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
        Schema::dropIfExists('orders');
    }
};

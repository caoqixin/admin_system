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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('brand');
            $table->string('name');
            $table->string('aliasName')->nullable();
            $table->tinyInteger('quality');
            $table->integer('supplier_id');
            $table->decimal('purchase_price');
            $table->integer('stock');
            $table->boolean('is_finish');
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
        Schema::dropIfExists('components');
    }
};

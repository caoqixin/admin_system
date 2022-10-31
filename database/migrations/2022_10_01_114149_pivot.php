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
        Schema::create('customer_repairs', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('repair_id');
            $table->timestamps();
        });

        Schema::create('detail_repairs', function (Blueprint $table) {
            $table->integer('repair_id');
            $table->integer('detail_id');
            $table->timestamps();
        });

        Schema::create('repair_components', function (Blueprint $table) {
            $table->integer('repair_id');
            $table->integer('component_id');
            $table->timestamps();
        });

        Schema::create('order_repairs', function (Blueprint $table) {
            $table->string('order_id');
            $table->integer('repair_id');
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
        Schema::dropIfExists('customer_repairs');
        Schema::dropIfExists('detail_repairs');
        Schema::dropIfExists('repair_components');
        Schema::dropIfExists('order_repairs');
    }
};

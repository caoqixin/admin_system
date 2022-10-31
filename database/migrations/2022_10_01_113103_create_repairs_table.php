<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('0: 手机维修, 1: 主板维修');
            $table->string('problem')->comment('维修问题');
            $table->tinyInteger('status')->comment('手机维修: [0: 未维修, 1: 维修中, 2: 维修完成, 3: 已取件],
            主板维修: [0: 已接单, 1: 已送修, 2: 维修完成, 3: 已取件, 4: 无法维修]');
            $table->decimal('deposit')->nullable();
            $table->decimal('price');
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
        Schema::dropIfExists('repairs');
    }
};

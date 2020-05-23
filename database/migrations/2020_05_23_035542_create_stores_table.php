<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 64)->comment('名称');
            $table->string('address', 255)->comment('地址');
            $table->string('tel', 16)->comment('电话');
            $table->string('image', 255)->comment('图片路径');
            $table->float('lat')->nullable()->comment('维度');
            $table->float('long')->nullable()->comment('经度');
            $table->float('order')->default(1)->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}

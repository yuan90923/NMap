<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zip')->comment('郵遞區號 (前3碼即可)');
            $table->string('city', 32)->comment('城市');
            $table->string('area', 32)->comment('區/鄉/鎮');
            $table->string('road', 32)->comment('路/街 (含段；中文)');
            $table->integer('lane')->nullable()->comment('巷 (數字)');
            $table->integer('alley')->nullable()->comment('弄 (數字)');
            $table->string('no', 8)->comment('號 (數字; 之用-表示)');
            $table->integer('floor')->nullable()->comment('樓');
            $table->string('address', 255)->nullable()->comment('其他資訊');
            $table->string('filename', 8)->nullable()->comment('Address 檔案');
            $table->float('latitude', 8, 5)->nullable()->comment('緯度');
            $table->float('lontitue' ,8, 5)->nullable()->comment('經度');
            $table->string('full_address', 255)->comment('整理過的完整地址');
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
        Schema::dropIfExists('address');
    }
}

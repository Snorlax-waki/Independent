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
        Schema::create('targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('name',100);
            $table->tinyInteger('daytype')->unsigned();
            $table->date('xday');
            $table->string('hobby',100)->nullable();
            $table->tinyInteger('fav_color')->unsigned()->nullable();
            $table->string('fav_food_drink',100)->nullable();
            $table->string('fav_thing',100)->nullable();
            $table->string('memo',500)->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};

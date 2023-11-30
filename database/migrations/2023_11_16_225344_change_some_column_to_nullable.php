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
        Schema::table('targets', function (Blueprint $table) {
            $table->integer('budget')->unsigned()->default(0)->nullable()->change();
            $table->tinyInteger('status')->unsigned()->nullable()->change();
            $table->string('idea',100)->nullable()->change();
            $table->string('url',255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->integer('budget')->unsigned()->default(0)->nullable(false)->change();
            $table->tinyInteger('status')->unsigned()->nullable(false)->change();
            $table->string('idea',100)->nullable(false)->change();
            $table->string('url',255)->nullable(false)->change();
        });
    }
};

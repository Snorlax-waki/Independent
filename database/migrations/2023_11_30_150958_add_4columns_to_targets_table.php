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
            $table->tinyInteger('hobby2')->unsigned()->nullable()->after('hobby');
            $table->tinyInteger('hobby3')->unsigned()->nullable()->after('hobby2');
            $table->tinyInteger('hobby4')->unsigned()->nullable()->after('hobby3');
            $table->tinyInteger('hobby5')->unsigned()->nullable()->after('hobby4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->dropColumn('hobby2');
            $table->dropColumn('hobby3');
            $table->dropColumn('hobby4');
            $table->dropColumn('hobby5');
        });
    }
};

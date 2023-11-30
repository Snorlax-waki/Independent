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
            $table->string('idea2',100)->nullable()->after('idea');
            $table->string('url2',255)->nullable()->after('url');
            $table->string('idea3',100)->nullable()->after('idea2');
            $table->string('url3',255)->nullable()->after('url2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->dropColumn('idea2');
            $table->dropColumn('url2');
            $table->dropColumn('idea3');
            $table->dropColumn('url3');
        });
    }
};

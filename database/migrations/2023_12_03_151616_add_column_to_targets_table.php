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
            $table->string('past',100)->nullable()->after('pre_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->dropColumn('past',100);
        });
    }
};

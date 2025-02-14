<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCalendarOperations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('calendar_operations', function (Blueprint $table): void {
            $table->dropColumn('staging');

            $table->string('staging_sys')->nullable();
            $table->integer('staging_sys_id')->nullable();
            $table->string('staging_info')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('calendar_operations', function (Blueprint $table): void {
            $table->dropForeign(['staging_sys_id']);

            $table->dropColumn('staging_sys');
            $table->dropColumn('staging_sys_id');
            $table->dropColumn('staging_info');

            $table->string('staging')->nullable();
        });
    }
}

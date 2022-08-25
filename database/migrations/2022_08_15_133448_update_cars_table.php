<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('cars')) {
            Schema::table('cars', function (Blueprint $table) {
                if (Schema::hasColumn('cars','salon')) {
                    $table->string('salon')->nullable()->change();
                }
                if (Schema::hasColumn('cars','kpp')) {
                    $table->string('kpp')->nullable()->change();
                }
                if (Schema::hasColumn('cars','year')) {
                    $table->unsignedInteger('year')->nullable()->change();
                }
                if (Schema::hasColumn('cars','color')) {
                    $table->string('color')->nullable()->change();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('salon')->change();
            $table->string('kpp')->change();
            $table->unsignedInteger('year')->change();
            $table->string('color')->change();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->datetime('date');
            $table->string('task_code', 16);
            $table->string('cycle_month', 8);
            $table->string('activity_type', 32);
            $table->string('team_code', 16);
            $table->string('contract_code', 16);
            $table->integer('area_cleared_sqm');
            $table->integer('num_deminers');
            $table->integer('minutes_worked');
        });
    }


    public function down()
    {
        Schema::dropIfExists('activities');
    }
};

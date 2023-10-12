<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm_objectives', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_id');
            $table->string('kpi_type');
            $table->string('objective',2048);
            $table->string('description',2048);
            $table->string('company_name',2048);
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
        Schema::dropIfExists('tm_objectives');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmcompetitorofferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmcompetitorofferings', function (Blueprint $table) {
            $table->id();
            $table->string('competitor_id');
            $table->string('sku_name');
            $table->string('photo');
            $table->string('sku_brief');
            $table->string('company_name');
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
        Schema::dropIfExists('tmcompetitorofferings');
    }
}

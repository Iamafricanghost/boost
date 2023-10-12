<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisterCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sister_companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('office_address');
            $table->string('tin');
            $table->string('contact_name');
            $table->string('contact_level');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('relation_type'); 
            $table->string('created_by');
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
        Schema::dropIfExists('sister_companies');
    }
}

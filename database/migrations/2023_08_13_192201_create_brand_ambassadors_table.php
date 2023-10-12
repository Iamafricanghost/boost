<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandAmbassadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_ambassadors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('gender');
            $table->string('phone');
            $table->string('phone_type');
            $table->string('age');
            $table->string('look_feel');
            $table->string('id_number');
            $table->string('residence');
            $table->string('english_fluency');
            $table->string('languages');
            $table->string('education_level');
            $table->string('work_experience');
            $table->string('transferable_skills');
            $table->string('reporting_capability');
            $table->string('role_applied_for');
            $table->string('expected_salary');
            $table->string('recommendation');
            $table->string('remarks');
            $table->string('general_rating');
            $table->string('photo');
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
        Schema::dropIfExists('brand_ambassadors');
    }
}

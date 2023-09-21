<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tbs', function (Blueprint $table) {
            $table->id();
            $table->string("year");
            $table->string("type_of_event");
            $table->string("title_of_training");
            $table->string("output");
            $table->string("location_of_training");
            $table->string("target_bene");
            $table->string("venue_of_training");
            $table->integer("quarter");
            $table->integer("expected_no_days");
            $table->integer("actual_no_days");
            $table->string("start_date");
            $table->string("end_date");
            $table->integer("p_female");
            $table->integer("p_male");
            $table->integer("p_pwd_male");
            $table->integer("p_pwd_female");
            $table->integer("p_total");
            $table->string("activity_code");
            $table->integer("indicator_no");
            $table->integer("indicator");
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
        Schema::dropIfExists('event_tbs');
    }
}

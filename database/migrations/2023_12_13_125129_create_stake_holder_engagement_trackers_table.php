<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeHolderEngagementTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stake_holder_engagement_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stateId');
            $table->date('Date_of_interaction');
            $table->string('state');
            $table->string('Programme_Year_From');
            $table->string('Programme_Year_To');
            $table->string('quarter');
            $table->string('Type_of_Stakeholders');
            $table->string('Designation_of_Stakeholders');
            $table->string('output');
            $table->string('Plane_Theme');
            $table->longText('Resolution_reached');
            $table->string('Action_taken_on_Resolution');
            $table->date('Date_Action_Taken')->nullable();
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
        Schema::dropIfExists('stake_holder_engagement_trackers');
    }
}

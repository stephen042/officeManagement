<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverableTbalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverable_tbales', function (Blueprint $table) {
            $table->id();
            $table->string('outputid');
            $table->string('stateid');
            $table->date('Year');
            $table->string('quarter');
            $table->string('Deliverable');
            $table->string('acheived');
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
        Schema::dropIfExists('deliverable_tbales');
    }
}

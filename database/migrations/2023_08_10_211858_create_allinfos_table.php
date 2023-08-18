<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allinfos', function (Blueprint $table) {
            $table->id();
            $table->string('output');
            $table->longText('indicator');
            $table->string('stateid');
            $table->string('target');
            $table->date('year');
            $table->string('Quater');
            $table->string('deliverable');
            $table->string('achieved');
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
        Schema::dropIfExists('allinfos');
    }
}

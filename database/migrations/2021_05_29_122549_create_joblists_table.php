<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoblistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joblists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('image');
            $table->longText('description');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedInteger('kecamatan_id');
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
        Schema::dropIfExists('joblists');
    }
}

<?php
// database/migrations/2023_04_23_000001_create_teams_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('banner_image');
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}


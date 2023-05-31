<?php

// database/migrations/2023_04_23_000002_create_members_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->string('name');
            $table->string('role')->nullable();
            $table->string('photo')->nullable();
            $table->string('pseudo')->nullable();
            $table->timestamps();
    
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('members');
    }

}
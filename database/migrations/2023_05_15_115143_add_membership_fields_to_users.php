<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMembershipFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('membership_status')->default(false);
            $table->date('membership_start_date')->nullable();
            $table->date('membership_end_date')->nullable();
            $table->date('membership_payment_date')->nullable();
            $table->integer('membership_duration')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('membership_status');
            $table->dropColumn('membership_start_date');
            $table->dropColumn('membership_end_date');
            $table->dropColumn('membership_payment_date');
            $table->dropColumn('membership_duration');
        });
    }
}


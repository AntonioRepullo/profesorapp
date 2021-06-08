<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol')->nullable();
            $table->string('location')->nullable();
            $table->string('experience')->nullable();
            $table->string('pricing')->nullable();
            $table->string('observations')->nullable();
            $table->string('ratings')->nullable();
            $table->string('methodology')->nullable();
            $table->bigInteger('phone')->nullable();

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
            $table->dropColumn('rol');
            $table->dropColumn('location');
            $table->dropColumn('experience');
            $table->dropColumn('pricing');
            $table->dropColumn('observations');
            $table->dropColumn('ratings');
            $table->dropColumn('methodology');
            $table->dropColumn('phone');
        });
    }
}

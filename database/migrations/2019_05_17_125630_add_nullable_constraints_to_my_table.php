<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableConstraintsToMyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->date('date_joined')->nullable()->change();
            $table->string('position')->nullable()->change();
            $table->string('annual_salary')->nullable()->change();
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
            //
            $table->date('date_joined')->nullable(false)->change();
            $table->string('position')->nullable(false)->change();
            $table->string('annual_salary')->nullable(false)->change();
        });
    }
}

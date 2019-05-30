<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSecondMigrateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            //
            
            $table->integer('id')->unsigned();
            $table->renameColumn('user_id', 'sourceuserid');
            $table->string('name');
            $table->renameColumn('body', 'message');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            //
            $table->dropForeign(['id']);
            $table->renameColumn('sourceuserid', 'user_id');
            $table->dropColumn('name');
            $table->renameColumn('message', 'body');
        });
    }
}

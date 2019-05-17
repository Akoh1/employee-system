<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegularUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('organization');
            // $table->integer('organization_id')->unsigned()->index();
            // $table->foreign('organization_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //  $table->integer('user_id')->unsigned()->index();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
            // $table->integer('is_active')->default(0);
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
        Schema::dropIfExists('admins');
        // $table->dropForeign('regular_users_user_id_foreign');
        // $table->dropIndex('regular_users_user_id_index');
        // $table->dropColumn('user_id');
    }
}

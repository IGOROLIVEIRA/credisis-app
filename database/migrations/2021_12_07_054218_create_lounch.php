<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLounch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lounchs', function (Blueprint $table) {
            $table->increments('id');
            $table->float('value');
            $table->string('type');
            $table->uuid('lot');
            $table->string('description');
            $table->string('system');
            $table->integer('user_account_id')->unsigned();
            $table->foreign('user_account_id')->references('id')->on('user_accounts');
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

        Schema::table('lounchs', function (Blueprint $table) {
            $table->dropForeign('user_account_user_account_id_foreign');
            $table->dropColumn(['user_account_id']);
        });
        Schema::dropIfExists('lounchs');
    }
}

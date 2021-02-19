<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRestauranteAddForeignUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurantes', function(Blueprint $table){
            $table->unsignedBigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurantes', function(Blueprint $table){
            $table->dropForeign('restaurantes_user_id_foreign');
            $table->dropColumn('owner_id');
       });
    }
}

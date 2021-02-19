<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMenuAddForeignRestaurante extends Migration{
    public function up(){
        Schema::table('menus', function(Blueprint $table){
            $table->unsignedBigInteger('restaurante_id')->unsigned();
            $table->foreign('restaurante_id')->references('id')->on('restaurantes');
        });
    }

    public function down(){
       Schema::table('menus', function(Blueprint $table){
            $table->dropForeign('menus_restaurante_id_foreign');
            $table->dropColumn('restaurante_id');
       });
    }
}

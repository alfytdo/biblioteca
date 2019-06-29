<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rols', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id','fk_usuariorols_rols')->references('id')->on('rols')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id','fk_usuariorols_usuarios')->references('id')->on('usuarios')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('usuario_rols');
    }
}

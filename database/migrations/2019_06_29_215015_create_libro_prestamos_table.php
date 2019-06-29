<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id','fk_libroprestamos_usuarios')->references('id')->on('usuario')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedInteger('book_id');
            $table->foreign('book_id','fk_libroprestamos_libros')->references('id')->on('libros')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->date('loan_date');
            $table->string('loan_to',100);
            $table->boolean('status');
            $table->date('return_date')->nullable();
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
        Schema::dropIfExists('libro_prestamos');
    }
}

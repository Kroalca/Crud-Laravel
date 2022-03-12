<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('almacen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('direccion');
        });

        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('observaciones');
            $table->double('column', 8, 2);
            $table->integer('id_categorias')->unsigned();
            $table->foreign('id_categorias')->references('id')->on('categorias');	
        });

        Schema::create('producto_almacen', function (Blueprint $table) {
            $table->integer('id_producto')->unsigned();
            $table->integer('id_almacen')->unsigned();
            $table->primary(array('id_producto', 'id_almacen'));	
            $table->foreign('id_producto')->references('id')->on('producto');
            $table->foreign('id_almacen')->references('id')->on('almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('almacen');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('producto_almacen');
    }
}

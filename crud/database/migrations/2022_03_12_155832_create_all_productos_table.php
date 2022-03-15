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
            $table->timestamps();
        });

        Schema::create('almacenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('adress');
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('comments');
            $table->double('price', 8, 2);
            $table->timestamps();
            $table->integer('id_categorias')->unsigned();
            $table->foreign('id_categorias')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('productos_almacenes', function (Blueprint $table) {
            $table->integer('id_productos')->unsigned();
            $table->integer('id_almacenes')->unsigned();
            $table->primary(array('id_productos', 'id_almacenes'));
            $table->timestamps();	
            $table->foreign('id_productos')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_almacenes')->references('id')->on('almacenes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('almacenes');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('productos_almacenes');
    }
}

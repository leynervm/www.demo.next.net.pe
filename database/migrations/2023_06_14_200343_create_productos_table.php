<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('slug')->unique();
            $table->string('modelo', 255)->nullable();
            $table->decimal('pricebuy', 10, 4);
            $table->decimal('pricesale', 10, 4)->nullable()->default(0);
            $table->decimal('igv', 10, 4)->default(0);
            $table->integer('publicado')->default(0);
            $table->string('code', 24)->nullable();
            $table->string('codefabricante', 24)->nullable();
            $table->integer('views')->default(0);
            $table->integer('minstock')->default(0);
            $table->unsignedSmallInteger('almacenarea_id')->nullable();
            $table->unsignedSmallInteger('estante_id')->nullable();
            $table->bigInteger('marca_id')->nullable();
            $table->unsignedTinyInteger('category_id')->nullable();
            $table->unsignedSmallInteger('subcategory_id')->nullable();
            $table->unsignedTinyInteger('unit_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('almacenarea_id')->on('almacenareas')->references('id');
            $table->foreign('estante_id')->on('estantes')->references('id');
            $table->foreign('marca_id')->on('marcas')->references('id');
            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('subcategory_id')->on('subcategories')->references('id')->nullOnDelete();
            $table->foreign('unit_id')->on('units')->references('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

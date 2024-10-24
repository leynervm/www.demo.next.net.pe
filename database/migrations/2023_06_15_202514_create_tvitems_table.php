<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nwidart\Modules\Facades\Module;

class CreateTvitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvitems', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->decimal('cantidad', 18, 4);
            $table->decimal('pricebuy', 18, 4);
            $table->decimal('price', 18, 4);
            $table->decimal('igv', 18, 4);
            $table->decimal('subtotaligv', 18, 4);
            $table->decimal('subtotal', 18, 4);
            $table->decimal('total', 18, 4);
            $table->integer('status')->default(0);
            $table->decimal('increment', 5, 2)->default(0);
            $table->char('alterstock', 1)->default(0);
            $table->char('gratuito', 1)->default(0);
            $table->bigInteger('promocion_id')->nullable();
            $table->bigInteger('almacen_id')->nullable();
            $table->bigInteger('producto_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->integer('tvitemable_id');
            $table->string('tvitemable_type', 255);
            $table->foreign('promocion_id')->on('promocions')->references('id');
            $table->foreign('almacen_id')->on('almacens')->references('id');
            $table->foreign('producto_id')->on('productos')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
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
        Schema::dropIfExists('tvitems');
    }
}

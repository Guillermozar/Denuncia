<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id('id');
            $table->date('fecha');
            $table->text('observacion');
            $table->text('descripcion');
            $table->text('long');
            $table->text('lat');
            $table->text('imagen');
            $table->text('tipo');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
             $table->unsignedBigInteger('id_estado')->nullable();
            $table->foreign('id_estado')->references('id')->on('estados');
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
        Schema::drop('denuncias');
    }
}

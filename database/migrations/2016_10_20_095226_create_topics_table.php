<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('body');
            $table->integer('subcategoria_id')->unsigned();
            $table->foreign('subcategoria_id')->references('id')->on('subcategories');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('isOpen')->default('1');
            $table->boolean('isPrivate');
            $table->integer('qtViews')->default('0');
            $table->integer('qtMessages')->default('0');
            $table->integer('lastUser')->unsigned()->nullable();



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
        Schema::dropIfExists('topics');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->char('isbn');
            $table->float('price');
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('quantity');
            $table->integer('status')->default(1);            
            $table->integer('idsubCates')->unsigned();
            $table->foreign('idsubCates')->references('id')->on('subCates');
            $table->integer('idUsers')->unsigned();
            $table->foreign('idUsers')->references('id')->on('users');
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
        Schema::dropIfExists('books');
    }
}

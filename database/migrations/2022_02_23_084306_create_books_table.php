<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            
            // $table->integer("integer_column");
            // $table->text("big_text")->nullable();
            $table->string("publisher");
            //naudoti author_id (int) jei kuriamas separate table
            //$table->integer("author_id");
            $table->string("category");
            $table->string("author");
            //$table->dateTime("publ_date");
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
};

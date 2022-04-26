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
            $table->foreignId("publisher_id")->constrained()->onDelete('cascade');
            //naudoti author_id (int) jei kuriamas separate table
            //$table->integer("author_id");
            $table->foreignId("category_id")->constrained();
            $table->foreignId("author_id")->constrained()->onDelete('cascade');
            $table->string('status')->default('Y');
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

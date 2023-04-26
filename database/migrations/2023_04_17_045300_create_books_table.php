<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id')->foreignId('id')->constrained('categories')->onDelete('cascade');
            $table->integer('publisher_id')->foreignId('id')->constrained('publishers')->onDelete('cascade');
            $table->string('sampul')->nullable();
            $table->integer('isbn');
            $table->string('title');
            $table->string('author');
            $table->integer('year');
            $table->integer('stock');
            $table->string('information')->nullable();
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

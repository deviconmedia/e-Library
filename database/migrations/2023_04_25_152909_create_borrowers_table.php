<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->foreignId('id')->constrained('members')->onDelete('cascade');
            $table->integer('book_id')->foreignId('id')->constrained('books')->onDelete('cascade');
            $table->integer('book_qty');
            $table->date('borrow_date');
            $table->date('date_return');
            $table->string('return_status')->default('Diterima');
            $table->string('information');
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
        Schema::dropIfExists('borrowers');
    }
}

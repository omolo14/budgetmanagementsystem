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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('expenses')->onDelete('cascade');
            $table->unsignedBigInteger('expensescategory_id')->index()->nullable();
            $table->foreign('expensescategory_id')->references('id')->on('expenses_categories')->onDelete('cascade');
            $table->string('name');
            $table->date('date');
            $table->string('description');
            $table->string('amount');
            $table->string('fees');
            $table->string('file')->nullable();
            $table->text('status');
            $table->string('createdby');
            $table->string('updatedby');
            $table->timestamps();
            $table->string('deletedby');
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};

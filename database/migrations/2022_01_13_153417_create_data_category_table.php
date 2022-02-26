<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_category', function (Blueprint $table) {
            $table->id();
            $table->string('name_customer')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('store')->nullable();
            $table->text('product')->nullable();
            $table->string('price')->nullable();
            $table->integer('category_id')->nullable();
            $table->foreign('category_id')
            ->references('id')->on('category')
            ->onDelete('set null');
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
        Schema::dropIfExists('data_category');
    }
}

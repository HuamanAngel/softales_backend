<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tales', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string("tal_titl");
            $table->string("tal_desc");
            $table->string("tal_fron_img")->default("https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg");
            $table->text("tal_cont");
            $table->unsignedInteger("col_id");
            // Foreign key between tales and collection
            $table->foreign('col_id')->references('id')->on('collections')->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::dropIfExists('tales');
    }
}

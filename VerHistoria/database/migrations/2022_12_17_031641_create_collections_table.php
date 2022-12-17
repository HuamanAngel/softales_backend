<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string("col_titl");
            $table->string("col_bann")->default("https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg");
            $table->string("col_desc");
            $table->string("col_cate")->nullable();
            $table->string("col_fron_img")->default("https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg");
            $table->unsignedBigInteger("user_id");
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
        Schema::dropIfExists('collections');
    }
}

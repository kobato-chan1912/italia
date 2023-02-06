<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->foreignId("category_id")->constrained();
            $table->string("meta_title");
            $table->string("meta_description");
            $table->string("url");
            $table->string("size");
            $table->integer("listeners")->default(0);
            $table->integer("downloads")->default(0);
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
        Schema::dropIfExists('songs');
    }
}

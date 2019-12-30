<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietyNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society_news', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->uuid('uuid')->unique();
            $table->integer('society_id')->unsigned();
            $table->enum('status', ['draft', 'pending', 'published']);
            $table->longtext('description')->nullable();
            $table->integer('view')->default(0);
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
        Schema::dropIfExists('society_news');
    }
}

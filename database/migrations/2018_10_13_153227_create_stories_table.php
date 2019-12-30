<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('user_id')->unsigned();
            $table->text('title')->nullable();
            $table->text('biliner')->nullable();
            $table->string('slug')->unique();
            $table->longText('body')->nullable();
            $table->enum('status', ['draft', 'pending', 'published']);
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('cover')->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('stories');
    }
}

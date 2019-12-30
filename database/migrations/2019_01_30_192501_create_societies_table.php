<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->uuid('uuid')->unique();
            $table->string('slug')->unique();
            $table->enum('category', ['tech', 'team', 'cultural', 'misc']);
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['draft', 'pending', 'published']);
            $table->longtext('description')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('contact_mail')->nullable();
            $table->text('head_incharge')->nullable();
            $table->text('pr_incharge')->nullable();
            $table->text('head_contact_number')->nullable();  
            $table->text('pr_contact_number')->nullable();  
            $table->text('website')->nullable();
            $table->integer('referrals')->default(0);
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
        Schema::dropIfExists('societies');
    }
}

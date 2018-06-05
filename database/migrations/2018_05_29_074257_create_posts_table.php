<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('content');
            $table->timestamps();
        });
    }
            // $tbale->integer('user_id');
            // $table->enum('type', ['standard', 'image', 'audio', 'video'])->default('standard');
            // $table->string('image')->nullable();
            // $table->string('video')->nullable();
            // $table->string('audio')->nullable();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

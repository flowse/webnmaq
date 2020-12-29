<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('commentID');
            $table->timestamps();
            $table->string('user');
            $table->unsignedBigInteger('blogID');
            $table->string('content');
            $table->boolean('published')->default(0);

            $table->foreign('blogID')->references('blogID')->on('blogs')->onDelete('cascade');;
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

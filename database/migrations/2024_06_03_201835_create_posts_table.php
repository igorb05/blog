<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->string('title');
            $table->text('content');
            $table->string('tag');
            $table->string('image');

            $table->bigInteger('views')->default(0);
            $table->string('slug');

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');

            $table->boolean('published')->default(true);
            $table->dateTime('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

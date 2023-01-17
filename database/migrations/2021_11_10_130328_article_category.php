<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticleCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('article_categories', function (Blueprint $table) {
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreignId('article_id');
            $table->foreign('article_id')->references('id')->on('articles');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_categories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadeDeleteToCommentsAndLikesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts')
                  ->cascadeOnDelete();
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['post_id']);

            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign(['post_id']);

            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');
        });
    }
}

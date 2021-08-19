<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('投稿者ID');
            $table->string('work_url')->comment('ポートフォリオURL');
            $table->string('repo_url')->comment('リポジトリURL');
            $table->text('comment')->comment('コメント')->nullable(true)->default(null); // textカラムにnullを許容。デフォルト値を設定。
            $table->boolean('is_published')->comment('公開フラグ')->default(true); // BOOLEAN型とは、真理値「true/false」をとるデータ型。
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
        Schema::dropIfExists('posts');
    }
}

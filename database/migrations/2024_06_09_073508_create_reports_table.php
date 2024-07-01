<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->foreignId('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('book_id')->foreignId('book_id')->references('id')->on('books');
            $table->longText('body');//string→longtext
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->softDeletes($column='deleted_at', $precision=0); //datetimeからsoftDeleteに変えること $precisionはミリ秒まで記録するかという精度の問題で0ならデフォルト
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};

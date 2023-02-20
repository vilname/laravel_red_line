<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->foreignId('section_id')->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('product_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->unique(['user_id', 'product_id'], 'unique_user_id_product_id_index');
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('review_files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->foreignId('review_id')->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_files');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('product_user');
        Schema::dropIfExists('products');
        Schema::dropIfExists('sections');
    }
};

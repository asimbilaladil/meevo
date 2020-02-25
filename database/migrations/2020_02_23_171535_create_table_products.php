<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->string('sku', 255)->nullable();
            $table->string('price')->nullable();
            $table->integer('price_ek')->nullable();
            $table->longText('description')->nullable();
            $table->string('brand', 255)->nullable();
            $table->string('color', 100)->nullable();
            $table->integer('rating')->nullable();
            $table->integer('rating_count')->nullable();
            $table->integer('stock')->nullable();
            $table->string('search_keyword')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}

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
        Schema::create('menu_product', function (Blueprint $table) {
            $table->id();
            //criando chave estrangeira para tabela de menus
            $table->foreignId('menu_id')
              ->constrained('menus')
              ->cascadeOnDelete();
            //criando chave estrangeira para tabela de products
            $table->foreignId('product_id')
              ->constrained('products')
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
        Schema::dropIfExists('menu_product');
    }
};

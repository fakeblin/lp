<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id'); 
			$table->string('name', 100); // Создание VARCHAR c названием заголовка name и длинной 100 символов
            $table->string('alias', 100); // Псевдоним с макс длинной 100
            $table->text('text');
            $table->string('images', 100);
            $table->timestamps(); // 2 поля: Создаем время создания таблицы, и время обновления таблицы
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}

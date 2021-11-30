<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Запуск миграций
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->comment('Пользователь');
            $table->string('user_name', 20)->comment('Имя пользователя');
            $table->string('category')->comment('Категория');
            $table->text('advertisement')->comment('Объявление');
            $table->string('phone', 8)->comment('Телефон');
            $table->timestamps();
        });
    }

    /**
     * Резервные миграции
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMypageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_mypage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->varchar('name');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->varchar('image');
            $table->data('start_date');
            $table->bigIncrements('user_id');//必要？
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_mypage');
    }
}

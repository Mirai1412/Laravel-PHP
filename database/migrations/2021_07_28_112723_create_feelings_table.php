<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeelingsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('feelings');
        //'feelings'라는 테이블이 있다면 삭제하고
        Schema::create('feelings', function (Blueprint $table) {
        //'feelings' 테이블을 생성합니다.

            $table->id(); //auto_increment
		   $table->string('board_no'); //게시글번호
		   $table->string('user'); //로그인한 사용자
		   $table->integer('like_no'); // 0 or 1
		   $table->integer('dislike_no'); // 0 or 1
            $table->integer('check'); // 0 or 1
            $table->timestamps();
    	});
    }

    public function down()
    {
        Schema::dropIfExists('feelings');
    }
}

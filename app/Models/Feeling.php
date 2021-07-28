<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeling extends Model
{
    use HasFactory;

    protected $table = 'feelings';
	//feelings 테이블을 사용한다.

	  public function save(array $request=[])
      // request 받은 내용을 array로 받아와서 save() 메소드의 파라미터로 사용한다.
	    {
	        if(parent::save($request))
	        {
	            $this->input('board_no','user','like_no','dislike_no','check');
                //들어온 값을 저장한다.
	        }
	    }


    protected $fillable = [
        'board_no','user','like_no','dislike_no','check'
        //변경하면 안되는 속성값인 id를 제외하고 값을 저장할 나머지 속성값들을 적어준다.
    ];
}

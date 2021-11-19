<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply_comment extends Model
{
    protected $table = 'reply_comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','comment_id','reply_comment_content'
    ];

    //Reply_comment thuộc người dùng
    public function user(){
        return $this->belongsTo('App\User');
    }

    //Reply_comment thuộc comment
    public function comment(){
        return $this->belongsTo('App\Comment');
    }

    public $timestamps = true;
}

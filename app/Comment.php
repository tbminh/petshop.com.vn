<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id', 'product_id','comment_content'
    ];

    public $timestamps = true;

    //Bình luận thuôc người dùng
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Bình luận thuôc sản phẩm
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    //Comment có nhiều reply_comment
    public function reply_comment(){
        return $this->hasMany('App\Reply_comment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingStar extends Model
{
    protected $table = 'rating_stars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','product_id','avg_number_star'
    ];

    public $timestamps = true;

    //Danh gia thuoc nguoi dung
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

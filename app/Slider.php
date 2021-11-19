<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','product_id','slider_title','slider_content','slider_image'
    ];

    public $timestamps = true;

    //Slider trình chiếu thuộc sản phẩm nào
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}

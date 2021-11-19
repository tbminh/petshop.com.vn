<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'order_id','product_id', 'total_quality','total_price'
    ]; 


    public $timestamps = true;


    //Chi tiet co trong hoa don
    public function Order()
    {
        return $this->belongsTo('App\Order');
    }

    //Hoa don chi tiet chua id thuoc san pham
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}

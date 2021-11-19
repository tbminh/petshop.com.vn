<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id', 'order_status','order_amount'
    ]; 

    public $timestamps = true;

    //Hoa don co nhieu hoa don chi tiet
    public function orderdetail()
    {
        return $this->hasMany('App\OrderDetail');
    }

    //Hoa don thuoc nguoi dung
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}


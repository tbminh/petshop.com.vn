<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    protected $table = 'product_suppliers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'product_id','supplier_id'
    ];

    public $timestamps = true;
    
    //(Nha cung cap san pham no cung la ProductSupplier) thuoc (Nha cung cap)
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    //(San pham cung cap no cung la ProductSupplier) thuoc (San pham)
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

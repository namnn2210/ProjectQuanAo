<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function getPriceStringAttribute()
    {
        return sprintf('%s VNĐ', number_format((($this->unit_price * $this->quantity)), 0));
    }
}

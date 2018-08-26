<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category() {
        return $this->belongsTo('App\Category','category_id');
    }

    public function brand() {
        return $this->belongsTo('App\Brand','brand_id');
    }

    public function getDiscountPriceWithFormatAttribute()
    {
        if ($this->discount == 0) {
            return sprintf('%s', number_format($this->price, 0));
        }
        return sprintf('%s', number_format(($this->price - ($this->price * $this->discount / 100)), 0));
    }

    public function getDiscountPriceStringAttribute()
    {
        if ($this->discount == 0) {
            return sprintf('%s (vnd)', number_format($this->price, 0));
        }
        return sprintf('%s (vnd)', number_format(($this->price - ($this->price * $this->discount / 100)), 0));
    }

    public function getOriginalPriceStringAttribute()
    {
        if ($this->discount == 0) {
            return '';
        }
        return sprintf('%s (vnd)', number_format($this->price, 0));
    }

    public function getDiscountPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }
}

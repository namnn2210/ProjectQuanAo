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

    public function getDiscountPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getDiscountPriceStringAttribute()
    {
        if ($this->discount == 0) {
            return sprintf('%s VNĐ', number_format($this->price, 0));
        }
        return sprintf('%s VNĐ', number_format(($this->price - ($this->price * $this->discount / 100)), 0));
    }

    public function getOriginalPriceStringAttribute()
    {
        if ($this->discount == 0) {
            return '';
        }
        return sprintf('%s VNĐ', number_format($this->price, 0));
    }

    public function isNew()
    {
        return time() - (60 * 60 * 24 * 7) < strtotime($this->created_at);
    }
    public function isDiscount()
    {
        return $this->discount > 0;
    }

    public function getBlockStyleAttribute()
    {
        if ($this->isNew() && $this->isDiscount()) {
            return 'both';
        } else if ($this->isNew()) {
            return 'new';
        } else if ($this->isDiscount()) {
            return 'sale';
        } else {
            return '';
        }
    }

    public function getImages($imgURL){
        $arrayImg = explode('&', $imgURL);
        return $arrayImg;
    }
}

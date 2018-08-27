<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/26/2018
 * Time: 6:47 PM
 */

namespace App;


class CartItem
{
    public function getTotalPriceWithFormat(){
        return sprintf('%s', number_format($this->product->DiscountPrice * $this->quantity, 0));
    }
}
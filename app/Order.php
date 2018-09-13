<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\OrderDetail', 'order_id');
    }

    public function getShipInformationAttribute()
    {
        return ' - '. $this->ship_phone . '<br> - '. $this->ship_name . '<br> - ' . $this->ship_address;
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case -1:
                return 'Đã huỷ';
                break;
            case 0:
                return 'Chờ xử lý';
                break;
            case 1:
                return 'Đã xác nhận';
                break;
            case 2:
                return 'Hoàn thành';
                break;
            default:
                return 'Không xác định';
                break;
        }
    }

    public function paymentMethod(){
        if($this -> payment_method == 'Cod'){
            return '0 VNĐ';
        }
        else if($this -> payment_method == 'Paypal'){
            return 'Đã thanh toán đủ';
        }
    }

    public function getPriceStringAttribute()
    {
        return sprintf('%s VNĐ', number_format($this->total_price/2, 0));
    }
}

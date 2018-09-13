<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Category;
use App\Http\Requests\StoreCustomer;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ShoppingCart;
use App\subcribed_user;
use App\Subscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Snowfire\Beautymail\Beautymail;
class ShoppingCartController extends Controller
{
    public function addToCart() {
        $id = Input::get('id');
        $quantity = Input::get('quantity');
        if ($id == null || $quantity == null) {
            return response()->json(['msg' => 'Thông tin không hợp lệ'], 404);
        }
        $product = Product::find($id);
        if ($product == null || $product->status != 1) {
            return response()->json(['msg' => 'Sản phẩm không tồn tại hoặc đã bị xoá!'], 404);
        }
        $shopping_cart = new ShoppingCart();
        if (Session::has('cart')) {
            $shopping_cart = Session::get('cart');
            if (array_key_exists($id, $shopping_cart->items)) {
                $quantity += $shopping_cart->items[$id]->quantity;
            }
        }
        $item = new CartItem();
        $item->product = $product;
        $item->product->dicountPriceString = $product->discountPriceString;
        $item->quantity = $quantity;
        $shopping_cart->items[$id] = $item;
        $shopping_cart->count = ShoppingCart::calculateTotalItem($shopping_cart);
        $shopping_cart->total_money = $shopping_cart->getTotalMoneyString();
        Session::put('cart', $shopping_cart);
        return response()->json(['msg' => 'Thêm vào giỏ hàng thành công', 'shopping_cart' => $shopping_cart], 200);
    }


    public function showCart()
    {
        $obj_category = Category::where('status', 1)->get();
        $shopping_cart = new ShoppingCart();
        if (Session::has('cart')){
            $shopping_cart = Session::get('cart');
        }
        return view('user.cart')
            ->with('obj_category',$obj_category)
            ->with('shopping_cart', $shopping_cart);
    }

    public function updateCart()
    {
        $shopping_cart = new ShoppingCart();
        $products = Input::get('products');
        if (is_array($products)){
            foreach (array_keys($products) as $key){
                $product = Product::find($key);
                if ($product == null || $product->status != 1) {
                    return view('error.404');
                }
                $item = new CartItem();
                $item->product = $product;
                $item->product->dicountPrice = $product->discountPrice;
                $item->quantity = $products[$key];
                $shopping_cart->items[$key] = $item;
                $shopping_cart->count = ShoppingCart::calculateTotalItem($shopping_cart);
                $shopping_cart->total_money = $shopping_cart->getTotalMoneyString();
            }
        }
        Session::put('cart', $shopping_cart);
        return response()->json(['shopping_cart' => $shopping_cart], 200);
    }

    public function checkout(){
        $obj_category = Category::where('status', 1)->get();
        $shopping_cart = new ShoppingCart();
        if (Session::has('cart')){
            $shopping_cart = Session::get('cart');
        }
        return view('user.checkout')
            ->with('obj_category',$obj_category)
            ->with('shopping_cart', $shopping_cart);
    }

    public function payment(){
        $obj_category = Category::where('status', 1)->get();
        $shopping_cart = new ShoppingCart();
        if (Session::has('cart')){
            $shopping_cart = Session::get('cart');
        }
        return view('user.payment')
            ->with('obj_category',$obj_category)
            ->with('shopping_cart', $shopping_cart);
    }

    public function checkoutCart(StoreCustomer $request)
    {
        $request -> validated();
        $obj_category = Category::where('status', 1)->get();
        if (Session::has('cart')) {
            try {
                DB::beginTransaction();
                $shopping_cart = Session::get('cart');
                $ship_name = Input::get('ship_name');
                $ship_address = Input::get('ship_address');
                $ship_phone = Input::get('ship_phone');
                $payment_method = Input::get('payment_method');
                $email = Input::get('email');
                if(Input::has('status') && Input::get('status') == 1){
                    $status = Input::get('status');
                    $customer = new Subscribed();
                    $customer -> email = $email;
                    $customer -> name = $ship_name;
                    $customer -> address = $ship_address;
                    $customer -> phone = $ship_phone;
                    $customer -> status = $status;
                    $customer -> save();
                }
                $order = new Order();
                $order->customer_id = 'KH' . round(microtime(true) * 1000);
                $order->ship_name = $ship_name;
                $order->ship_address = $ship_address;
                $order->ship_phone = $ship_phone;
                $order->ship_email = $email;
                $order->payment_method = $payment_method;
                $order->total_price = $shopping_cart -> getTotalMoney();
                $order->save();
                $order_id = $order->id;
                $order_details = array();
                foreach ($shopping_cart->items as $item){
                    $product = Product::find($item->product->id);
                    if ($product == null || $product->status != 1) {
                        return view('404');
                    }
                    $quantity = $item->quantity;
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order_id;
                    $order_detail->product_id = $product->id;
                    $order_detail->quantity = $quantity;
                    $order_detail->unit_price = $product->discountPrice;
                    $order->total_price += $order_detail->unit_price * $order_detail->quantity;
                    $order_detail->save();
                    array_push($order_details, $order_detail);
                }
                $data = array('obj_category' => $obj_category, 'order' => $order, 'order_details' => $order_details);
                $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
                $beautymail->send('user.receipt_mail', $data, function($message)
                {
                    $order_id = Order::orderBy('created_at', 'desc')->first();
                    $ship_name = Input::get('ship_name');
                    $mail = Input::get('email');
                    $message
                        ->from('vu.tienphuc97@gmail.com')
                        ->to($mail, $ship_name)
                        ->subject('Hóa đơn đơn hàng #' . $order_id -> id);
                });
                DB::commit();
                Session::remove('cart');
                return view('user.receipt')
                    ->with('obj_category',$obj_category)
                    ->with('order', $order)
                    ->with('order_details', $order_details);
            } catch (\Exception $exception) {
                DB::rollBack();
                return 'Có lỗi xảy ra.' . $exception->getMessage();
            }
        }
        else {
            return redirect('/product')->with('message', 'Hiện tại chưa có sản phẩm nào trong giỏ hàng.');
        }
    }

    public function removeItem()
    {
        $id = Input::get('id');
        $shopping_cart = Session::get('cart');
        foreach ($shopping_cart->items as $key => $value)
        {
            if ($key == $id)
            {
                unset($shopping_cart->items[$key]);
            }
        }
        Session::put('cart', $shopping_cart);
        return redirect('/view-cart');
    }

    public function receipt()
    {
        $obj_category = Category::where('status', 1)->get();
        $shopping_cart = new ShoppingCart();
        if (Session::has('cart')){
            $shopping_cart = Session::get('cart');
        }
        return view('user.receipt3')
            ->with('obj_category',$obj_category)
            ->with('shopping_cart', $shopping_cart);
    }
}

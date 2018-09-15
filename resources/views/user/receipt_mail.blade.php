<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
            width: 5%;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total{
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
    <script>
        $(document).ready(function (){
            var total = 0;
            $('.item').each(function () {
                $(this).find('.price').text( numeral($(this).find('.price').text()).format('0,0'));
                 total += parseFloat($(this).find('.price').text().replace(/,/g, ""));
            });
            $('.receipt_items_total_price').text(numeral(total).format('0,0') + ' VNĐ')
            $('.receipt_total_price').text(numeral(parseFloat($('.receipt_items_total_price').text().replace(/,/g, "").replace(' VNĐ', '')) + parseFloat($('.shipping_fee').text().replace(/,/g, "").replace(' VNĐ', ''))).format('0,0') + ' VNĐ')
        });
    </script>
</head>


<body>
<div class="invoice-box" style="margin-top: 180px; margin-bottom: 30px">
    <img src="https://i.imgur.com/1GiFNsE.png" style="max-width: 30%">
    <hr>
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <p>Cảm ơn quý khách đã đặt hàng tại Farfetch. Đơn hàng #{{$order -> id}} của quý khách đã được tiếp nhận và đang trong quá trình xử lý.
                            Farfetch sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</p>
                        <br>
                        <h4>Thông tin đơn hàng #{{$order -> id}} ({{$order -> created_at}})</h4>
                        <hr>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <b>Thông tin thanh toán</b><br>
                            {{$order -> ship_name}}<br>
                            {{$order -> ship_email}}<br>
                            {{$order -> ship_phone}}
                        </td>

                        <td>
                            <b>Địa chỉ giao hàng</b><br>
                            {{$order -> ship_name}}<br>
                            {{$order -> ship_address}}<br>
                            {{$order -> ship_phone}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Phương thức thanh toán
            </td>
            <td>
                Đã thanh toán
            </td>
        </tr>

        <tr class="details">
            <td>
                {{$order -> payment_method}}
            </td>

            <td>
                {{$order -> paymentMethod()}}
            </td>
        </tr>

        <tr class="heading">
            <td>
                Đơn hàng
            </td>

            <td>
                Giá
            </td>
        </tr>
        @foreach($order_details as $item)
            <tr class="item">
                <td>
                    {{$item -> product -> name}}
                </td>
                <td class="price">
                    {{$item -> PriceString}}
                </td>
            </tr>
        @endforeach
        <tr >
            <td>Tổng giá trị sản phẩm</td>
            <td class="receipt_items_total_price">
                {{$order -> PriceString}}
            </td>
        </tr>
        <tr>
            <td>Phí vận chuyển</td>
            <td class="shipping_fee">
                0 VNĐ
            </td>
        </tr>
        <tr class="total">
            <td>Tổng giá trị đơn hàng</td>
            <td class="receipt_total_price">
                {{$order -> PriceString}}
            </td>
        </tr>
    </table>
</div>
</body>
</html>

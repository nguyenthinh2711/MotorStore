@extends('layout')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Shopping Cart<span>D&H STORE</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Size</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cart as $key)
                            <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="{{ route('product_detail').'/'.$key->id }}">
                                                <img src="{{ asset('img'.'/'.$key->options->img) }}" alt="{{ $key->name}}">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a href="{{ route('product_detail').'/'.$key->id }}">{{ $key->name }}</a>
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col">{{ number_format($key->price) }}</td>
                                <td class="price-col">{{ $key->options->size }}</td>
                                <td class="quantity-col">
                                    <div class="cart-product-quantity">
                                        <input type="number" data-id="{{ $key->rowId }}" class="form-control" value="{{ $key->qty }}" min="1" max="" step="1" data-decimals="0" required>
                                    </div><!-- End .cart-product-quantity -->
                                </td>
                                <td class="total-col">{{ number_format($key->price * $key->qty) }}</td>

                                <td class="remove-col">
                                    <form action="{{ route('cart.destroy', $key->rowId) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn-remove" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="icon-close"></i></button>   
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><!-- End .table table-wishlist -->

                    <div class="cart-bottom">
                        <span class="btn btn-outline-dark-2 edit-all" onclick="update()">CẬP NHẬP GIỎ HÀNG<i class="icon-refresh"></i></span>
                    </div><!-- End .cart-bottom -->
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                    <div class="summary summary-cart">
                        <h3 class="summary-title">Tổng số giỏ hàng</h3><!-- End .summary-title -->

                        <table class="table table-summary">
                            <tbody>
                                <tr class="summary-subtotal">
                                    <td>Tổng phụ:</td>
                                    <td>{{ Cart::subtotal(0,3) }}</td>
                                </tr><!-- End .summary-subtotal -->
                                <tr class="summary-shipping">
                                    <td>Giao hàng:</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="free-shipping" name="shipping" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="free-shipping" >Miễn phí giao hàng</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>0 VNĐ</td>
                                </tr><!-- End .summary-shipping-row -->

                                <tr class="summary-total">
                                    <td>Tổng tiền hàng:</td>
                                    <td>{{ Cart::subtotal(0,3) }}</td>
                                </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->
                        <?php
                            $user_id = Session::get("user_id");
                            if ($user_id != null)
                        {?>
                            <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">TIẾP TỤC THANH TOÁN</a>
                        <?php } else { ?>
                            <a href="{{ route('get_login_order') }}" class="btn btn-outline-primary-2 btn-order btn-block">TIẾP TỤC THANH TOÁN</a>
                        <?php } ?>
                    </div><!-- End .summary -->
                    <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>TIẾP TỤC MUA HÀNG</span><i class="icon-refresh"></i></a>
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
<script>
    function update(){
        var list=[];
        $("table tbody tr td").each(function(){
            $(this).find("input.form-control").each(function(){
                var element = {key: $(this).data("id"), value: $(this).val()};
                list.push(element);
            });
        });
        $.ajax({
            type: "POST",
            url: "update-all-cart",
            data: {
                "_token" : "{{ csrf_token() }}",
                "data" : list
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
</script>
@endsection
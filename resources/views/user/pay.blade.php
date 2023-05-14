@extends('layout')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Thủ tục thanh toán<span>D&H STORE</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Mua Hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thủ tục thanh toán</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="checkout">
        <div class="container">
            <form action="{{ route('checkout') }}"  method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="checkout-title">Chi tiết thanh toán</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="txtid" class="form-control" value="<?php echo Session::get('user_id') ?>" />
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Tên khách hàng *</label>
                                    <input type="text" autofocus name="txtName" pattern="^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌÓỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$" class="form-control" @error('txtName') is-invalid @enderror value="{{ old('txtName') }}" required autocomplete="txtName">
                                </div><!-- End .col-sm-6 -->
                                @error('txtName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- End .row -->

                            <label>Ngày sinh *</label>
                            <input type="date" name="txtDate" class="form-control" value="" required>

                            <label>Địa chỉ khách hàng *</label>
                            <input type="text" name="txtad" class="form-control @error('txtad') is-invalid @enderror"  value="{{ old('txtad') }}" required autocomplete="txtad">
                            @error('txtad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="row">
                                <div class="col-sm-6">
                                        <label>Email *</label>
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  name="txtEmail" class="form-control @error('txtEmail') is-invalid @enderror"  autocomplete="txtEmail" value="<?php echo Session::get('username') ?>"  required >
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <label>Số điện thoại *</label>
                                    <input type="number" pattern="[0-9]{10}" name="txtPhone" class="form-control @error('txtPhone') is-invalid @enderror" value="{{ old('txtPhone') }}" required autocomplete="txtPhone" >
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->


                            <label>Ghi chú</label>
                            <textarea class="form-control" name="txtNote" cols="30" rows="4" placeholder="Nội dung ghi chú đơn hàng"></textarea>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Đơn hàng</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($cart as $key)
                                    <tr>
                                        <td><a href="#">{{ $key->name }}</a></td>
                                        <td>{{ number_format($key->price)." "."VND"}}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="summary-subtotal">
                                        <td>Tổng phụ:</td>
                                        <td>{{ Cart::subtotal(0,3)." "."VND" }}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>Giao hàng:</td>
                                        <td>Miễn phí</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{ Cart::subtotal(0,3)." "."VND" }}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">Đặt hàng</span>
                                <span class="btn-hover-text">Xác nhận đặt hàng</span>
                            </button>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>
        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div><!-- End .page-content -->

@endsection
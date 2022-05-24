
@extends('layout')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">History order<span>Motor Store</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">History order</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->


<div class="about_content">
    <div class="container mt-5">
        <div class="row order-body">
            @php
            $tt = 1;
            @endphp
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Code</th>
                        <th>Customer name</th>
                        <th>Booking date</th>
                        <th>Customer phone</th>
                        <th>customer address</th>
                        <th>total  (VNĐ)</th>
                        <th>Note order</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($order_history as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Mã đơn hàng">{{$r->id}}</td>
                        <td data-label="Tên khách hàng" style="text-align:left">{{ $r->customer->CustomerName }}</td>
                        <td data-label="Ngày đặt">{{ \Carbon\Carbon::parse($r->OrderDate)->format('d/m/Y') }}</td>
                        <td data-label="Số điện thoại nhận">{{ $r->ShipPhone }}</td>
                        <td data-label="Địa chỉ nhận" >{{ $r->ShipAddress }}</td>
                        <td data-label="Tổng tiền(đ)" >{{ number_format($r->total ) }}</td>
                        <td data-label="Ghi chú" >{{ $r->Note }}</td>
                        <td data-label="Trạng thái">
                            @if($r->Status == 0)
                            <a href="#" class="label label-warning">Chờ xử lý</a>
                            @else
                            <a href="#" class="label-success label">Đã xử lý</a>
                            @endif
                        </td>
                        <td data-label="Xem" class="right__iconTable">
                            <a  data-id ="{{ $r->id }}" href="{{ route('history_order_detail', $r->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
   
</div>
@endsection
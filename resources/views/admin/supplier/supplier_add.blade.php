@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm nhà cung cấp</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('supplier.store') }}" method="post">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tên nhà cung cấp</label>
            <input type="text" name="SupplierName" class="form-control @error('SupplierName') is-invalid @enderror"  placeholder="Tên nhà cung cấp" value="{{ old('SupplierName') }}" required  autofocus>
            @error('SupplierName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="title">Địa chỉ nhà cung cấp</label>
            <input type="text" name="Address" class="form-control @error('Address') is-invalid @enderror"  placeholder="Địa chỉ nhà cung cấp" value="{{ old('Address') }}" required  autofocus>
            @error('Address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="title">Số điện thoại</label>
            <input type="text" name="Phone" class="form-control @error('Phone') is-invalid @enderror"  placeholder="Số điện thoại" value="{{ old('Phone') }}" required  autofocus>
            @error('Phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="title">Email</label>
            <input type="text" name="Email" class="form-control @error('Email') is-invalid @enderror"  placeholder="Email" value="{{ old('Email') }}" required  autofocus>
            @error('Email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button class="btn btn-info" name="supplier-add" type="submit">Add</button>
    </form>
</div>
@endsection
@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thống kê nhà cung cấp</p>
<?php
    use Illuminate\Support\Facades\Session;
    $message = Session::get('message');
    if($message){
        echo '<span style="color: red">'.$message.'</span>';
        Session::put('message',null);
    }
?>   
<div class="right__table">
    <div class="right__tableWrapper">
    @php
        $tt = 1;
    @endphp
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại nhận</th>
                    <th>Email</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($suppliers as  $supplier)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Tên khách hàng" style="text-align:left">{{ $supplier->SupplierName }}</td>
                        <td data-label="Ngày đặt">{{ $supplier->Address }}</td>
                        <td data-label="Số điện thoại nhận">{{ $supplier->Phone }}</td>
                        <td data-label="Địa chỉ nhận" style="text-align:left">{{ $supplier->Email }}</td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{route('supplier.edit', $supplier->id)}}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('supplier.destroy', $supplier->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><img src="{{ asset('assets/icon-trash.svg') }}" alt=""></button>   
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
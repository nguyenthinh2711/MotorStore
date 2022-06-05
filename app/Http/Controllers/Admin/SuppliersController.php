<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = Suppliers::paginate(10);
        return view("admin.supplier.suppliers")->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.supplier.supplier_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'SupplierName' => 'required|unique:suppliers|max:255',
            'Address' => 'required',
            'Phone' => 'required|numeric',
            'Email' => 'required|email',  
        ]);
        $supplier = new Suppliers();
        $supplier->SupplierName = $request->SupplierName;
        $supplier->Address = $request->Address;
        $supplier->Phone = $request->Phone;
        $supplier->Email = $request->Email;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message','Thêm nhà cung cấp thành công');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sup = Suppliers::find($id);
        return view("admin.supplier.supplier_update")->with('sup',$sup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'SupplierName' => 'required|max:255',
            'Address' => 'required',
            'Phone' => 'required|numeric',
            'Email' => 'required|email',  
        ]);
        $supplier = Suppliers::find($id);
        $supplier->SupplierName = $request->SupplierName;
        $supplier->Address = $request->Address;
        $supplier->Phone = $request->Phone;
        $supplier->Email = $request->Email;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message','Sửa nhà cung cấp thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier = Suppliers::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('message','Xóa nhà cung cấp thành công');
    }
    
}

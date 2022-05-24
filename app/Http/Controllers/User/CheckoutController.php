<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Customers;
use App\User;
use App\Http\Requests\CheckoutRequest;
use Cart;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\AuthLogin;
use Section;
// session_start();

class CheckoutController extends Controller
{

    public function  get_login_order()
    {
        return view('user.login_order');
    }

    public function login_order(AuthLogin $request)
    {
        $username = $request->username;
        $ps = User::where("username", $request->username)->value('password');
        $password = Hash::check($request->password, $ps);

        $result = User::where('username', $username)->first();
       
        if(($result == true) && ($password == true)){
            Session::put('user_id', $result->id);
            Session::put('username', $result->username);
            return redirect()->route('checkout');
        }
        else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return redirect()->route('get_login_order');
        }
    }

    public function logout_checkout()
    {
        Session::flush();
        return redirect()->route('get_login_order');
    }
    
    public function getFormPay(Request $request)
    {
        
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view("user.pay", compact("categories", "cart","product_pay","search_product","category_footer"));

    }

    public function postFormPay(Request $request)
    {
        
        $c_id = $request->txtid;
        $c_email = $request->txtEmail;
        $c_name = $request->txtName;
        $total = Cart::subtotal(0,3);
        $totalMoney = str_replace(",","",Cart::subtotal(0,3));
   
        if (Customers::where('Email', $request->txtEmail)->exists()) {
            $customer_id = Customers::where("Email", $request->txtEmail)->value('id');
            if ($customer_id) {
                $order_id = Orders::insertGetId([
                'CustomerId' => $customer_id,
                'total' => (int)$totalMoney,
                'Note' => $request->txtNote,
                'OrderDate' => now('Asia/Ho_Chi_Minh'),
                'ShipPhone' => $request->txtPhone,
                'ShipAddress' => $request->txtad,
                'Status' => 0,
                'created_at' => now(),
                'updated_at' => now()
                ]);
            }
            if ($order_id) {
               $cart = Cart::content();
               
               foreach ($cart as $key => $value) {
                   OrderDetails::insert([
                        'OrderId' => $order_id,
                        'ProductId' => $value->id,
                        'Quantity' => $value->qty,
                        'UnitPrice' => $value->price,
                        'AddDate' => now('Asia/Ho_Chi_Minh'),
                        'created_at' => now(),
                        'updated_at' => now()
                   ]);
                   $prd = Products::find($value->id);
                   $prd->Quantity = $prd->Quantity - $value->qty;
                   $prd->Sold = $prd->Sold + $value->qty;
                   $prd->save();
               }
            }
        }
        else {
            
             $customer_id = Customers::insertGetId([
                "UserId" => $c_id,
                "CustomerName" => $request->txtName,
                "DateOfBirth" => $request->txtDate,
                "Address" => $request->txtad,
                "Phone" => $request->txtPhone,
                "Email" => $request->txtEmail,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            if ($customer_id) {
                $order_id = Orders::insertGetId([
                'CustomerId' => $customer_id,
                'total' => (int)$totalMoney,
                'Note' => $request->txtNote,
                'OrderDate' => now('Asia/Ho_Chi_Minh'),
                'ShipPhone' => $request->txtPhone,
                'ShipAddress' => $request->txtad,
                'Status' => 0,
                'created_at' => now(),
                'updated_at' => now()
    
                ]);
            
            }
          
            if ($order_id) {
               $cart = Cart::content();
               foreach ($cart as $key => $value) {
                   OrderDetails::insert([
                        'OrderId' => $order_id,
                        'ProductId' => $value->id,
                        'Quantity' => $value->qty,
                        'UnitPrice' => $value->price,
                        'AddDate' => now('Asia/Ho_Chi_Minh'),
                        'created_at' => now(),
                        'updated_at' => now()
                   ]);
                   $prd = Products::find($value->id);
                   $prd->Quantity = $prd->Quantity - $value->qty;
                   $prd->Sold = $prd->Sold + $value->qty;
                   $prd->save();
               }
            }
        }
        Cart::destroy();
        return redirect()->route("checkout_success")->with("success","Đặt hàng thành công");

      
    }

    public function success(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
       return view("user.checkout_success", compact("categories", "cart","product_pay","search_product","category_footer"));
    }

    public function history(Request $request)
    {
        $user = Session::get('user_id');
        $cus_id = Customers::where('UserId', $user)->first()->id;
        $order_history = Orders::orderBy("OrderDate","DESC")->where('CustomerId', $cus_id)->get();
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();\
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view('user.history', compact("order_history","categories", "cart","product_pay","search_product","category_footer"));
    }

    public function history_order_detail(Request $request, $order_id)
    {
        $order_customer =  OrderDetails::where("OrderId", $order_id)->limit(1)->get();
        $order_detail = OrderDetails::where("OrderId", $order_id)->get();
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view('user.history_order_detail', compact("order_customer","order_detail","categories", "cart","product_pay","search_product","category_footer"));
    }
}

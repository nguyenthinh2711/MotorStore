<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Discount;
use App\Models\Picture;
use App\Models\OrderDetails;
use Cart;
use Auth;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{

  
    public function index(Request $request)
    {
       
        $categories = CategoryProducts::all(); //LIST CATEGORY


        $products = Products::orderBy('id', 'DESC')->limit(5)->get();     //LIST PRODUCT
        $product_new = Products::orderBy('created_at', 'DESC')->limit(10)->get();
        $product_asc = Products::where('Cate_Id', 12)->orderBy('id', 'DESC')->orderby("ProductName", "asc")->limit(6)->get();
        $product_bt= Products::where('Cate_Id', 11)->orderBy('id', 'DESC')->limit(6)->get();
        $dt = Carbon::now()->toDateString();
        $products_sale = Discount::where('BeginDate','<=',$dt)->where('EndDate','>=',$dt)->get(); 
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $product_topsell = Products::orderBy('Sold', 'DESC')->limit(10)->get();
        $cart = Cart::content(); 

        // SEARCH PRODUCT
        $keywords = $request->txtSearch;    
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }

        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
  
        return view("user.index", compact(
            "categories", 
            "products", 
            "product_asc", 
            "product_bt", 
            "products_sale", 
            "product_pay",
            "cart", 
            "search_product",
            "category_footer",
            "product_new",
            "product_topsell"
        ));
    }

    public function search(Request $request)
    {
       return view("user.index", compact("search_product"));
    }
}

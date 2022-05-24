<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Products;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use Gloudemans\Shoppingcart\Facades\Cart;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
       
        $categories = CategoryProducts::all(); //LIST CATEGORY


        $products = Products::orderBy('id', 'DESC')->limit(5)->get();     //LIST PRODUCT
        $product_asc = Products::where('Cate_Id', 12)->orderBy('id', 'DESC')->orderby("ProductName", "asc")->limit(6)->get();
        $product_bt= Products::where('Cate_Id', 11)->orderBy('id', 'DESC')->limit(6)->get();

        $products_sale = Discount::all(); 
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
 
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
  
        return view("user.test", compact(
            "categories", 
            "products", 
            "product_asc", 
            "product_bt", 
            "products_sale", 
            "product_pay",
            "cart", 
            "search_product",
            "category_footer"));
    }
}

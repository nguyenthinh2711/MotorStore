<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\OrderDetails;
use Cart;
use Auth;
use DB;


class ProductController extends Controller
{
    //
   
    public function index($id,Request $request)
    {
        $categories = CategoryProducts::where('Status',1)->get();
        $cate_selected = CategoryProducts::where("id",$id)->get();

        $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(10);
        

        $product_count = Products::select("Cate_Id", DB::raw("count(id) as count"))
                        ->groupBy("Cate_Id")->get();

        $cart = Cart::content();
        

        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        // SEARCH 
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }


        //DISPLAY PRODUCT
        if ($request->display) {
            $display = $request->display;
            switch ($display) {
                case '3':
                    $products = Products::where("Cate_Id", $id)->paginate(3);
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->paginate(6);
                    break;
                case '9':
                    $products = Products::where("Cate_Id", $id)->paginate(9);
                    break;
                case '12':
                    $products = Products::where("Cate_Id", $id)->paginate(12);
                    break;
                case '15':
                    $products = Products::where("Cate_Id", $id)->paginate(15);
                    break;
                default:
                     $products = Products::where("Cate_Id", $id)->paginate(6);
            }
        } 
        
        //FILTER PRICE
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products = Products::where("Cate_Id", $id)->where('Price','<',100000)->paginate(12);
                    break;
                case '2':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 300000])->paginate(12);
                    break;
                case '3':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [300000, 500000])->paginate(12);
                    break;
                case '4':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[500000, 1000000])->paginate(12);
                    break;
                case '5':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[1000000, 2000000])->paginate(12);
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[2000000, 3000000])->paginate(12);
                    break;
                case '7':
                    $products = Products::where("Cate_Id", $id)->where('Price','>',3000000)->paginate(12);
                    break;
                    
            }
        } 
        
        
        //SORT PRODUCT 
        
       
        if ($request->orderby) {
            $orderby = $request->orderby;
            $price = $request->price;
            switch ($orderby) {
                case 'desc': // NEW
                    $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(12);
                    break;
                case 'asc':  //OLD
                    $products = Products::where("Cate_Id", $id)->orderBy('id','ASC')->paginate(12);
                    break;
                case 'price_max': // ascending
                      $products = Products::where("Cate_Id", $id)->orderBy('Price','ASC')->paginate(12);
                      break;
                case 'price_min': //decrease
                    $products = Products::where("Cate_Id", $id)->orderBy('Price','DESC')->paginate(12);
                    break;
                default:
                     $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(12);
                    
            }
           
            
        }
        if ($request->orderby  && $request->price) {
            $orderby = $request->orderby;
            $price = $request->price;
            switch ($orderby) {
                case 'desc': // NEW
                    switch ($price) {
                        case '1':
                            $products = Products::where("Cate_Id", $id)->where('Price','<',100000)->orderBy('id','DESC')->paginate(12);
                            break;
                        case '2':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 300000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '3':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [300000, 500000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '4':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[500000, 1000000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '5':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[1000000, 2000000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '6':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[2000000, 3000000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '7':
                            $products = Products::where("Cate_Id", $id)->where('Price','>',3000000)->orderBy('id','DESC')->paginate(12);
                            break;
                            
                    }
                    break;
                case 'asc':  //OLD
                    $products = Products::where("Cate_Id", $id)->orderBy('id','ASC')->paginate(12);
                    switch ($price) {
                        case '1':
                            $products = Products::where("Cate_Id", $id)->where('Price','<',100000)->orderBy('id','ASC')->paginate(12);
                            break;
                        case '2':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 300000])->orderBy('id','ASC')->paginate(12);
                            break;
                        case '3':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [300000, 500000])->orderBy('id','ASC')->paginate(12);
                            break;
                        case '4':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[500000, 1000000])->orderBy('id','ASC')->paginate(12);
                            break;
                        case '5':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[1000000, 2000000])->orderBy('id','ASC')->paginate(12);
                            break;
                        case '6':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[2000000, 3000000])->orderBy('id','ASC')->paginate(12);
                            break;
                        case '7':
                            $products = Products::where("Cate_Id", $id)->where('Price','>',3000000)->orderBy('id','ASC')->paginate(12);
                            break;
                            
                    }
                    break;
                case 'price_max': // ascending
                      switch ($price) {
                        case '1':
                            $products = Products::where("Cate_Id", $id)->where('Price','<',100000)->orderBy('Price','ASC')->paginate(12);
                            break;
                        case '2':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 300000])->orderBy('Price','ASC')->paginate(12);
                            break;
                        case '3':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [300000, 500000])->orderBy('Price','ASC')->paginate(12);
                            break;
                        case '4':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[500000, 1000000])->orderBy('Price','ASC')->paginate(12);
                            break;
                        case '5':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[1000000, 2000000])->orderBy('Price','ASC')->paginate(12);
                            break;
                        case '6':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[2000000, 3000000])->orderBy('Price','ASC')->paginate(12);
                            break;
                        case '7':
                            $products = Products::where("Cate_Id", $id)->where('Price','>',3000000)->orderBy('Price','ASC')->paginate(12);
                            break;
                            
                    }
                      break;
                case 'price_min': //decrease
                    switch ($price) {
                        case '1':
                            $products = Products::where("Cate_Id", $id)->where('Price','<',100000)->orderBy('Price','DESC')->paginate(12);
                            break;
                        case '2':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 300000])->orderBy('Price','DESC')->paginate(12);
                            break;
                        case '3':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [300000, 500000])->orderBy('Price','DESC')->paginate(12);
                            break;
                        case '4':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[500000, 1000000])->orderBy('Price','DESC')->paginate(12);
                            break;
                        case '5':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[1000000, 2000000])->orderBy('Price','DESC')->paginate(12);
                            break;
                        case '6':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[2000000, 3000000])->orderBy('Price','DESC')->paginate(12);
                            break;
                        case '7':
                            $products = Products::where("Cate_Id", $id)->where('Price','>',3000000)->orderBy('Price','DESC')->paginate(12);
                            break;
                            
                    }
                    break;
                default:
                     switch ($price) {
                        case '1':
                            $products = Products::where("Cate_Id", $id)->where('Price','<',100000)->orderBy('id','DESC')->paginate(12);
                            break;
                        case '2':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 300000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '3':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price', [300000, 500000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '4':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[500000, 1000000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '5':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[1000000, 2000000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '6':
                            $products = Products::where("Cate_Id", $id)->whereBetween('Price',[2000000, 3000000])->orderBy('id','DESC')->paginate(12);
                            break;
                        case '7':
                            $products = Products::where("Cate_Id", $id)->where('Price','>',3000000)->orderBy('id','DESC')->paginate(12);
                            break;
                            
                    }
                    
            }
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        // dd($products);
        return view("user.product", 
                compact("categories",
                        "products",
                        "cart",
                        "product_count",
                        "product_pay",
                        "search_product",
                        "category_footer",
                        "cate_selected",
                    ));
    }

    public function searchAPI(Request $request){
        $products = Products::where('ProductName','LIKE',"%".$request->txtSearch."%")->take(4)->get();
        return $products;
    }
}

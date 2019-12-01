<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Product;

class ProductsController extends Controller
{
  public function index()
  {
      $products = Product::orderBy('id', 'desc')->paginate(16);
      return view('user.backup.product.allproducts')->with('products', $products);
  }
  public function show($slug)
  {
      $product = Product::where('slug', $slug)->first();
      if (!is_null($product)) {
        return view('user.backup.product.details', compact('product'));
      }else {
        session()->flash('errors', 'Sorry !! There is no product by this URL..');
        return redirect()->route('products');
      }
  }

  public function shop(Request $request) {
        if ($request->ajax() && isset($request->start)) {
            $start = $request->start; // min price value
            $end = $request->end; // max price value

            $Products = DB::table('products')
                    ->where('price', '>=', $start)->where('price', '<=', $end)->orderby('price', 'ASC')->paginate(12);

             response()->json($Products); //return to ajax
            return view('user.backup.product.allproducts', compact('Products'));
        }
        else if(isset($request->brand)){

           $brand = $request->brand; //brand

            $Products = DB::table('products')->whereIN('cat_id', explode( ',', $brand ))->paginate(6);
            response()->json($Products); //return to ajax
            return view('user.backup.product.allproducts', compact('Products'));


        }
        else {

            $Products = DB::table('products')->paginate(6); // now we are fetching all products
            return view('front.shop', compact('Products'));
        }
    }


}

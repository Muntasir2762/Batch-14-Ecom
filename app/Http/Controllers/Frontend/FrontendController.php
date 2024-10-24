<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index ()
    {
        $hotProducts = Product::where('product_type', 'hot')->get();
        $regularProducts = Product::where('product_type', 'regular')->get();
        $newProducts = Product::where('product_type', 'new')->get();
        $discountProducts = Product::where('product_type', 'discount')->get();
        return view ('frontend.index', compact('hotProducts', 'regularProducts', 'newProducts', 'discountProducts'));
    }

    public function productDetails ($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        return view ('frontend.product-details', compact('product'));
    }

    public function viewCart ()
    {
        return view ('frontend.view-cart');
    }

    public function checkout ()
    {
        return view ('frontend.checkout');
    }

    public function addToCart (Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::find($id);

        if($cartProduct == null){
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = 1;
            if($product->discount_price != null){
                $cart->price = $product->discount_price;
            }
    
            if($product->discount_price == null){
                $cart->price = $product->regular_price;
            }

            
            $cart->save();
            toastr()->success('Successfully added to cart!');
            return redirect()->back();
        }

        if($cartProduct != null)
        {
            $cartProduct->qty = $cartProduct->qty+1;
            $cartProduct->save();
            toastr()->success('Successfully added to cart!');
            return redirect()->back();
        }

    }

    public function addToCartDelete ($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        toastr()->success('Successfully deleted from cart!');
        return redirect()->back();
    }

    public function addToCartDetails (Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::find($id);

        if($cartProduct == null){
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = $request->qty;
            $cart->size = $request->size;
            $cart->color = $request->color;
            if($product->discount_price != null){
                $cart->price = $product->discount_price;
            }
    
            if($product->discount_price == null){
                $cart->price = $product->regular_price;
            }

            
            $cart->save();
            if($request->action == "addToCart"){
                toastr()->success('Successfully added to cart!');
                return redirect()->back();
            }

            else if($request->action == "buyNow"){
                toastr()->success('Successfully added to cart!');
                return redirect('/checkout');
            }
        }

        if($cartProduct != null)
        {
            $cartProduct->qty = $cartProduct->qty+$request->qty;
            $cartProduct->save();

            if($request->action == "addToCart"){
                toastr()->success('Successfully added to cart!');
                return redirect()->back();
            }

            else if($request->action == "buyNow"){
                toastr()->success('Successfully added to cart!');
                return redirect('/checkout');
            }
        }
    }


    //Category Products...
    public function categoryProducts ($slug, $id)
    {
        $products = Product::where('cat_id', $id)->get();
        $productsCount = $products->count();
        return view ('frontend.category-products', compact('products', 'productsCount'));
    }
}

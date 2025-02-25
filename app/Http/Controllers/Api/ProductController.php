<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts ()
    {
        $products = Product::get();
        $hotProducts = Product::where('product_type', 'hot')->get();
        $regularProducts = Product::where('product_type', 'regular')->get();
        $newProducts = Product::where('product_type', 'new')->get();
        $discountProducts = Product::where('product_type', 'discount')->get();

        return response()->json([
            'hotproducts' => $hotProducts,
            'regularProducts' => $regularProducts,
            'newProducts' => $newProducts,
            'discountProducts' => $discountProducts,
        ]);
    }
}

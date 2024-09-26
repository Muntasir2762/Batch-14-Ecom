<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create ()
    {
        $categories = Category::get();
        $subCategories = Subcategory::get();
        return view ('backend.product.create', compact('categories', 'subCategories'));
    }

    public function store (Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->buying_price = $request->buying_price;
        $product->qty = $request->qty;
        $product->sku_code = $request->sku_code;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

        if(isset($request->image)){
            $imageName = rand().'-product-'.'.'.$request->image->extension();  // 948675-product-.jpg
            $request->image->move('backend/images/product/', $imageName);

            $product->image = $imageName;
        }
        
        $product->save();  //45

        // Add Color...
        if(isset($request->color)){
            foreach($request->color as $colorName){
                $color = new Color();
                $color->product_id = $product->id;
                $color->color_name = $colorName;
                $color->save();
            }
        }

        // Add Size...
        if(isset($request->size)){
            foreach($request->size as $sizeName){
                $size = new Size();
                $size->product_id = $product->id;
                $size->size_name = $sizeName;
                $size->save();
            }
        }

        // Gallery Image....
        if(isset($request->galleryImage)){
            foreach($request->galleryImage as $image){
                $galleryImage = new GalleryImage();
                $galleryImage->product_id = $product->id;

                $imageName = rand().'-gallery-'.'.'.$image->extension();
                $image->move('backend/images/galleryImage/', $imageName);

                $galleryImage->image = $imageName;
                $galleryImage->save();
            }
        }


        return redirect()->back();

    }

    public function show ()
    {
        $products = Product::with('category', 'subCategory')->get();
        return view ('backend.product.show', compact('products'));
    }

    public function delete ($id)
    {
        $product = Product::where('id', $id)->first();

        if($product->image && file_exists('backend/images/product/'.$product->image)){
            unlink('backend/images/product/'.$product->image);
        }

        //Color Delete...
        $colors = Color::where('product_id', $id)->get();

        foreach($colors as $color){
            $color->delete();
        }

        //Size Delete...
        $sizes = Size::where('product_id', $id)->get();

        foreach($sizes as $size){
            $size->delete();
        }

        //GalleryImage Delete...
        $galleryImages = GalleryImage::where('product_id', $id)->get();

        foreach($galleryImages as $image){

            if($image->image && file_exists('backend/images/galleryImage/'.$image->image)){
                unlink('backend/images/galleryImage/'.$image->image);
            }

            $image->delete();
        }

        $product->delete();
        return redirect()->back();
    }

    public function edit ($id)
    {
        $product = Product::with('color', 'size', 'galleryImage')->where('id', $id)->first();
        $categories = Category::get();
        $subCategories = Subcategory::get();
        return view ('backend.product.edit', compact('product', 'categories', 'subCategories'));
    }
}

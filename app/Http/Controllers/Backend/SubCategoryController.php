<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function create ()
    {
        $categories = Category::get();
        return view ('backend.subcategory.create', compact('categories'));
    }

    public function store (Request $request)
    {
        $subCategory = new Subcategory();

        $subCategory->cat_id = $request->cat_id;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);

        $subCategory->save();
        return redirect()->back();
    }

    public function show ()
    {
        $subCategories = Subcategory::get();
        return view ('backend.subcategory.list', compact('subCategories'));
    }

    public function delete ($id)
    {
        $subCategory = Subcategory::find($id);
        $subCategory->delete();
        return redirect()->back();
    }
}

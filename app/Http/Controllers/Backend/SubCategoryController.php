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
        $subCategories = Subcategory::with('category')->get();
        return view ('backend.subcategory.list', compact('subCategories'));
    }

    public function delete ($id)
    {
        $subCategory = Subcategory::find($id);
        $subCategory->delete();
        return redirect()->back();
    }

    public function edit ($id)
    {
        $subCategory = Subcategory::find($id);
        $categories = Category::get();
        return view ('backend.subcategory.edit', compact('subCategory', 'categories'));
    }

    public function update (Request $request, $id)
    {
        $subCategory = Subcategory::find($id);

        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->cat_id = $request->cat_id;

        $subCategory->save();
        return redirect('admin/show-subcategory');

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create ()
    {
        return view ('backend.category.create');
    }

    public function store (Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if(isset($request->image)){
            $imageName = rand().'-category-'.'.'.$request->image->extension();  // 948675-category-.jpg
            $request->image->move('backend/images/category/', $imageName);

            $category->image = $imageName;
        }

        $category->save();
        return redirect()->back();
    }

    public function show ()
    {
        $categories = Category::get();
        return view ('backend.category.list', compact('categories'));
    }

    public function delete ($id)
    {
        $category = Category::find($id);

        if($category->image && file_exists('backend/images/category/'.$category->image)){
            unlink('backend/images/category/'.$category->image);
        }

        $category->delete();

        return redirect()->back();
    }
}

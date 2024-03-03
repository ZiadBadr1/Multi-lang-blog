<?php

namespace App\Http\Controllers\Dashboard\Modules\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Traits\GeneralTrait;

class CategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = Category::with('parent')->paginate(10);
//        dd($categories);
        return view('dashboard.category.index',compact('categories'));
    }
    public function create()
    {
        $categories = Category::where('parent_id' , null)->get();
        return view('dashboard.category.create',compact('categories'));
    }
    public function store(CategoryStoreRequest $request)
    {
        $attributes = $request->validated();

        if($request->hasFile('image'))
        {
            $attributes['image'] = $this->uploadImage($request,$attributes,'image','category');
        }
        Category::create($attributes);
        return redirect()->back()->with('success',__("created_successfully"));
    }
    public function show()
    {
        //
    }
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id' , null)->get();
//        dd($category->translation);
        return view('dashboard.category.edit',compact('categories','category'));
    }
    public function Update(CategoryUpdateRequest $request,Category $category)
    {
        $attributes = $request->validated();
        if($request->hasFile('image'))
        {
            $attributes['image'] = $this->uploadImage($request,$attributes,'image','category');
        }
        $category->update($attributes);
        return redirect()->back()->with('success',__("updated_successfully"));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success',__('deleted_successfully'));
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Modules\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Blogs\BlogStoreRequest;
use App\Http\Requests\Dashboard\Blogs\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Traits\GeneralTrait;

class BlogController extends Controller
{

    use GeneralTrait;
    public function index()
    {
        $blogs = Blog::with('category')->paginate(10);
        return view('dashboard.blog.index',compact('blogs'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.blog.create',compact('categories'));
    }
    public function store(BlogStoreRequest $request)
    {
        $attributes = $request->validated();

        if($request->hasFile('image'))
        {
            $attributes['image'] = $this->uploadImage($request,$attributes,'image','blog');
        }
        Blog::create($attributes);
        return redirect()->back()->with('success',__("created_successfully"));
    }
    public function show()
    {

    }
    public function edit(Blog $blog)
    {
        $categories = Category::all();
//        dd($blog->translation);
        return view('dashboard.blog.edit',compact('categories','blog'));
    }
    public function Update(BlogUpdateRequest $request,Blog $blog)
    {
        $attributes = $request->validated();
        if($request->hasFile('image'))
        {
            $attributes['image'] = $this->uploadImage($request,$attributes,'image','blog');
        }
        $blog->update($attributes);
        return redirect()->back()->with('success',__("updated_successfully"));
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success',__('deleted_successfully'));
    }
}

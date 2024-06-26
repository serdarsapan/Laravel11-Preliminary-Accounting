<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id','asc')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        $category = Category::pluck('name','id');
        

        return view('admin.blogs.edit')->with(['categories'=> $categories, 'category'=>$category]);
    }

    public function store(BlogRequest $request)
    {
       $blog = Blog::create([
        'statusUrnHzm' => $request->statusUrnHzm,
        'code' => $request->code,
        'name' => $request->name,
        'barcode' => $request->barcode,
        'tags' => $request->tags,
        'origin' => $request->origin,
        'gtip' => $request->gtip,
        'description' => $request->description,
        'hzmCode' => $request->hzmCode,
        'hzmName' => $request->hzmName,
        'hzmBarcode' => $request->hzmBarcode,
        'hzmTags' => $request->hzmTags,
        'hzmDescription' => $request->hzmDescription,
        'statusAlis' => $request->statusAlis,
        'alisFiyat' => $request->alisFiyat,
        'statusSatis' => $request->statusSatis,
        'satisFiyat'=> $request->satisFiyat,
        'kdv' => $request->kdv,
        'discount' => $request->discount
        ]);

       $blog->categories()->sync($request->category);

        return back()->with('success', 'Blog created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::pluck('name','id');
        $selectedCategory = BlogCategory::whereBlogId($id)->pluck('category_id')->toArray();

        return view('admin.blogs.edit', compact('categories','selectedCategory','blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->update([
                'statusUrnHzm' => $request->statusUrnHzm,
                'code' => $request->code,
                'name' => $request->name,
                'barcode' => $request->barcode,
                'tags' => $request->tags,
                'origin' => $request->origin,
                'gtip' => $request->gtip,
                'description' => $request->description,
                'hzmCode' => $request->hzmCode,
                'hzmName' => $request->hzmName,
                'hzmBarcode' => $request->hzmBarcode,
                'hzmTags' => $request->hzmTags,
                'hzmDescription' => $request->hzmDescription,
                'statusAlis' => $request->statusAlis,
                'alisFiyat' => $request->alisFiyat,
                'statusSatis' => $request->statusSatis,
                'satisFiyat'=> $request->satisFiyat,
                'kdv' => $request->kdv,
                'discount' => $request->discount
            ]);

            $blog->categories()->sync($request->category);

            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
        } else {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }
    }

    public function destroy($id)
    {
        $Blog = Blog::findOrFail($id);
        $Blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }

    public function status(Request $request)
    {
        $status = $request->statusUrnHzm;
        $updateCheck = $status == "false" ? '0' : '1';

        Blog::where('id',$request->id)->update(['status'=> $updateCheck]);

        return response(['error'=>false,'statusUrnHzm'=>$status]);
    }
}
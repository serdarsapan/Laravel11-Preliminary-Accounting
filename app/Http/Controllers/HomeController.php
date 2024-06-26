<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::whereStatus('1')->get();
        $categories = Category::whereStatus('1')->get();

        return view('blog')->with(['blogs' => $blogs, 'categories' => $categories]);
    }

    public function view($slug)
    {
        $categories = Category::whereStatus('1')->get();
        $blog = Blog::whereSlug($slug)->first();
        $blogCategory = BlogCategory::whereBlogId($slug)->get();
        $blogCategories = [];
        foreach ($blogCategory as $cat) {
            $cat = $this->categoryPluck($cat->category_id);
            $blogCategories[] = $cat;
        }

        return view('view')->with(['blog' => $blog, 'blogCategories' => $blogCategories, 'categories' => $categories, 'blogCategory' => $blogCategory]);
    }

    public function category($id)
    {
        $blog = Blog::whereStatus('1')->get();
        $categories = Category::whereStatus('1')->get();
        $category = Category::with('blogs')->find($id);

        if ($category) {
            $categoryBlogs = $category->blogs;

            return view('blog', compact('categoryBlogs','categories','blog'));
        } else {

            return redirect()->back()->with('error', 'Category Could Not Found!');
        }
    }

    public function categoryPluck($categoryId)
    {
        $category = Category::find($categoryId);

        return [
            'id' => $category->id,
            'name' => $category->name,
        ];
    }
}
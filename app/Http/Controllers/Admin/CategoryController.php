<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\UserRolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('parent',null)->get();
       
            return view('admin.categories.edit',compact('categories'));
       
    }

    public function permissionCheck($permission){
        $userRole = 1;
        
        return  UserRolePermission::whereRoleId(1)->whereName($permission)->first();
    }

    public function store(CategoryRequest $request)
    {
        $parent = $request->input('parent');
        $parentID = !empty($parent) ? $parent[0] : null;

        Category::create([
            'name' => $request->name,
            'parent' => $parentID,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Kategori başarıyla oluşturuldu');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        $categories = Category::all();
        $category = Category::where('id',$id)->first();

        return view('admin.categories.edit', compact('categories','category','cat'));
    }

    public function update(CategoryRequest $request, $id)
    {
        Category::where('id',$id)->update(['name','status']);

        return back()->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted successfully');
    }

    public function status(Request $request)
    {
        $status = $request->status;
        $updateCheck = $status == "false" ? '0' : '1';

        Category::where('id',$request->id)->update(['status'=> $updateCheck]);

        return response(['error'=>false,'status'=>$status]);
    }
}
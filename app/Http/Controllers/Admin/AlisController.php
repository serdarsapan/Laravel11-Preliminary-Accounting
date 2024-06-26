<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SatisRequest;
use App\Models\Alis;
use App\Models\BlogSatis;
use App\Models\Blog;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DateTime;

class AlisController extends Controller
{
    public function index()
    {
        $alis = Alis::orderBy('id','asc')->get();

        return view('admin.alis.index', compact('alis'));
    }

    public function create(Request $request)
    {
        $blogs = Blog::all();
        $blog = Blog::pluck('name','id');
        $account = Account::all();

        return view('admin.alis.edit')->with([ 'blogs'=> $blogs, 'blog'=> $blog, 'account'=> $account]);
    }

    public function store(SatisRequest $request)
    {
        $duzenlemeTarihParts = explode('/', $request->duzenlemeTarih);
        if (count($duzenlemeTarihParts) === 3) {
            $duzenlemeTarih = $duzenlemeTarihParts[2] . '-' . $duzenlemeTarihParts[1] . '-' . $duzenlemeTarihParts[0];
        } else {
            return back()->withErrors(['duzenlemeTarih' => 'Invalid date format.']);
        }
       

       $alis = Alis::create([
        'cari' => $request->cari,
        'cariAdres' => $request->cariAdres,
        'duzenlemeTarih' => $duzenlemeTarih,
        'duzenlemeSaat' => $request->duzenlemeSaat,
        'seriNo' => $request->seriNo,
        'odemeStatus' => $request->odemeStatus,
        'vadeTarih' => $request->vadeTarih,
        'tags' => $request->tags,
        'description' => $request->description,
        'urunHizmet' => $request->urunHizmet,
        'miktar' => $request->miktar,
        'birimFiyat' => $request->birimFiyat,
        'kdv' => $request->kdv,
        ]);

       $alis->blogs()->sync($request->blog);

        return back()->with('success', 'Satış created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $alis = Alis::find($id);
        $selectedBlog = BlogSatis::whereSatisId($id)->pluck('blog_id')->toArray();
        $blogs = Blog::pluck('name','id');
        $account = Account::find($id);

        return view('admin.alis.edit', compact('blogs','selectedBlog','alis','account'));
    }

    public function update(SatisRequest $request, $id)
    {
        $alis = Alis::find($id);
        if ($alis) {
            $alis->update([
                'cari' => $request->cari,
                'cariAdres' => $request->cariAdres,
                'duzenlemeTarih' => $request->duzenlemeTarih,
                'duzenlemeSaat' => $request->duzenlemeSaat,
                'seriNo' => $request->seriNo,
                'odemeStatus' => $request->odemeStatus,
                'vadeTarih' => $request->vadeTarih,
                'tags' => $request->tags,
                'description' => $request->description,
                'urunHizmet' => $request->urunHizmet,
                'miktar' => $request->miktar,
                'birimFiyat' => $request->birimFiyat,
                'kdv' => $request->kdv,
            ]);

            $alis->blogs()->sync($request->blog);

            return redirect()->route('alis.index')->with('success', 'Satış updated successfully');
        } else {
            return redirect()->route('alis.index')->with('error', 'Satış not found');
        }
    }

    public function destroy($id)
    {
        $Alis = Alis::findOrFail($id);
        $Alis->delete();

        return redirect()->route('alis.index')->with('success', 'Satış deleted successfully');
    }

    public function odemeStatus(Request $request)
    {
        $odemeStatus = $request->odemeStatus;
        $updateCheck = $odemeStatus == "false" ? '0' : '1';

        Alis::where('id',$request->id)->update(['odemeStatus'=> $updateCheck]);

        return response(['error'=>false,'odemeStatus'=>$odemeStatus]);
    }
}
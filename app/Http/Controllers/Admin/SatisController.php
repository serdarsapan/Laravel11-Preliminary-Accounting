<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SatisRequest;
use App\Models\Satis;
use App\Models\BlogSatis;
use App\Models\Blog;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DateTime;

class SatisController extends Controller
{
    public function index()
    {
        $satis = Satis::orderBy('id','asc')->get();

        return view('admin.satis.index', compact('satis'));
    }

    public function create(Request $request)
    {
        $blogs = Blog::all();
        $blog = Blog::pluck('name','id');
        $account = Account::all();

        return view('admin.satis.edit')->with([ 'blogs'=> $blogs, 'blog'=> $blog, 'account'=> $account]);
    }

    public function store(SatisRequest $request)
    {
        $duzenlemeTarihParts = explode('/', $request->duzenlemeTarih);
        if (count($duzenlemeTarihParts) === 3) {
            $duzenlemeTarih = $duzenlemeTarihParts[2] . '-' . $duzenlemeTarihParts[1] . '-' . $duzenlemeTarihParts[0];
        } else {
            return back()->withErrors(['duzenlemeTarih' => 'Invalid date format.']);
        }
       

       $satis = Satis::create([
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

       $satis->blogs()->sync($request->blog);

        return back()->with('success', 'Satış created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $satis = Satis::find($id);
        $selectedBlog = BlogSatis::whereSatisId($id)->pluck('blog_id')->toArray();
        $blogs = Blog::pluck('name','id');
        $account = Account::find($id);

        return view('admin.satis.edit', compact('blogs','selectedBlog','satis','account'));
    }

    public function update(SatisRequest $request, $id)
    {   
        $duzenlemeTarihParts = explode('/', $request->duzenlemeTarih);
        if (count($duzenlemeTarihParts) === 3) {
            $duzenlemeTarih = $duzenlemeTarihParts[2] . '-' . $duzenlemeTarihParts[1] . '-' . $duzenlemeTarihParts[0];
        } else {
            return back()->withErrors(['duzenlemeTarih' => 'Invalid date format.']);
        }
       
        $satis = Satis::find($id);
        if ($satis) {
            $satis->update([
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

            $satis->blogs()->sync($request->blog);

            return redirect()->route('satis.index')->with('success', 'Satış updated successfully');
        } else {
            return redirect()->route('satis.index')->with('error', 'Satış not found');
        }
    }

    public function destroy($id)
    {
        $Satis = Satis::findOrFail($id);
        $Satis->delete();

        return redirect()->route('satis.index')->with('success', 'Satış deleted successfully');
    }

    public function odemeStatus(Request $request)
    {
        $odemeStatus = $request->odemeStatus;
        $updateCheck = $odemeStatus == "false" ? '0' : '1';

        Satis::where('id',$request->id)->update(['odemeStatus'=> $updateCheck]);

        return response(['error'=>false,'odemeStatus'=>$odemeStatus]);
    }
}
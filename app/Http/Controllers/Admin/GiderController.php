<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiderRequest;
use App\Models\Gider;
use App\Models\GiderCategory;
use App\Models\Category;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DateTime;

class GiderController extends Controller
{
    public function index()
    {
        $gider = Gider::orderBy('id','asc')->get();

        return view('admin.gider.index', compact('gider'));
    }

    public function create(Request $request)
    {
        $account = Account::all();
        $categories = Category::all();
        $category = Category::pluck('name','id');
        $selectedCategory = GiderCategory::whereGiderId('id', $request->id)->pluck('category_id')->toArray();

        return view('admin.gider.edit')->with([ 'categories'=> $categories, 'category'=> $category, 'selectedCategory'=> $selectedCategory, 'account'=> $account]);
    }

    public function store(GiderRequest $request)
    {
        $duzenlemeTarihParts = explode('/', $request->duzenlemeTarih);
        if (count($duzenlemeTarihParts) === 3) {
            $duzenlemeTarih = $duzenlemeTarihParts[2] . '-' . $duzenlemeTarihParts[1] . '-' . $duzenlemeTarihParts[0];
        } else {
            return back()->withErrors(['duzenlemeTarih' => 'Invalid date format.']);
        }
        $odemeTarihParts = explode('/', $request->odemeTarih);
        if (count($odemeTarihParts) === 3) {
            $odemeTarih = $odemeTarihParts[2] . '-' . $odemeTarihParts[1] . '-' . $odemeTarihParts[0];
        } else {
            return back()->withErrors(['odemeTarih' => 'Invalid date format.']);
        }
       

       $gider = Gider::create([
        'cari' => $request->cari ?? null,
        'duzenlemeTarih' => $duzenlemeTarih,
        'seriNo' => $request->seriNo,
        'odemeStatus' => $request->odemeStatus,
        'bankName' => $request->bankName,
        'odemeTarih' => $odemeTarih,
        'tags' => $request->tags,
        'description' => $request->description,
        'giderTip' => $request->giderTip,
        'araToplam' => $request->araToplam,
        'kdv' => $request->kdv,
        'digerVergi' => $request->digerVergi,
        'faturaTutar' => $request->faturaTutar,
        'sonOdeme' => $request->sonOdeme,
        ]);

       $gider->categories()->sync($request->category);

        return back()->with('success', 'Gider created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $account = Account::all();
        $gider = Gider::find($id);
        $categories = Category::all();
        $category = Category::pluck('name','id');
        $selectedCategory = GiderCategory::whereGiderId('id', $id)->pluck('category_id')->toArray();

        return view('admin.gider.edit', compact('gider','selectedCategory','categories', 'category', 'account'));
    }

    public function update(GiderRequest $request, $id)
    {
        $duzenlemeTarihParts = explode('/', $request->duzenlemeTarih);
        if (count($duzenlemeTarihParts) === 3) {
            $duzenlemeTarih = $duzenlemeTarihParts[2] . '-' . $duzenlemeTarihParts[1] . '-' . $duzenlemeTarihParts[0];
        } else {
            return back()->withErrors(['duzenlemeTarih' => 'Invalid date format.']);
        }
        $odemeTarihParts = explode('/', $request->odemeTarih);
        if (count($odemeTarihParts) === 3) {
            $odemeTarih = $odemeTarihParts[2] . '-' . $odemeTarihParts[1] . '-' . $odemeTarihParts[0];
        } else {
            return back()->withErrors(['odemeTarih' => 'Invalid date format.']);
        }
        $gider = Gider::find($id);
        if ($gider) {
            $gider->update([
                'cari' => $request->cari,
                'duzenlemeTarih' => $duzenlemeTarih,
                'seriNo' => $request->seriNo,
                'odemeStatus' => $request->odemeStatus,
                'bankName' => $request->bankName,
                'odemeTarih' => $odemeTarih,
                'tags' => $request->tags,
                'description' => $request->description,
                'giderTip' => $request->giderTip,
                'araToplam' => $request->araToplam,
                'kdv' => $request->kdv,
                'digerVergi' => $request->digerVergi,
                'faturaTutar' => $request->faturaTutar,
                'sonOdeme' => $request->sonOdeme,
            ]);

            $gider->categories()->sync($request->category);
            return redirect()->route('gider.index')->with('success', 'Gider updated successfully');
        } else {
            return redirect()->route('gider.index')->with('error', 'Gider not found');
        }
    }

    public function destroy($id)
    {
        $Gider = Gider::findOrFail($id);
        $Gider->delete();

        return redirect()->route('gider.index')->with('success', 'Gider deleted successfully');
    }

    public function odemeStatus(Request $request)
    {
        $odemeStatus = $request->odemeStatus;
        $updateCheck = $odemeStatus == "false" ? '0' : '1';

        Gider::where('id',$request->id)->update(['odemeStatus'=> $updateCheck]);

        return response(['error'=>false,'odemeStatus'=>$odemeStatus]);
    }
}
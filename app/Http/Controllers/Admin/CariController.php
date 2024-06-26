<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CariRequest;
use App\Models\Cari;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CariController extends Controller
{
    public function index()
    {
        $cari = Cari::orderBy('id','asc')->get();
        
        return view('admin.cari.index', compact('cari'));
    }

    public function create(Request $request)
    {
        return view('admin.cari.edit');
    }

    public function store(CariRequest $request)
    {
       Cari::create([
            'cariStatus' => $request->cariStatus,
            'code' => $request->code,
            'name' => $request->name,
            'surname' => $request->surname,
            'type' => $request->type,
            'islemTarih' => $request->islemTarih,
            'tags' => $request->tags,
            'tckn' => $request->tckn,
            'vergiDaire' => $request->vergiDaire,
            'mersis' => $request->mersis,
            'tel' => $request->tel,
            'mail' => $request->mail,
            'web' => $request->web,
            'faks' => $request->faks,
            'adresTip' => $request->adresTip,
            'adres' => $request->adres,
            'il' => $request->il,
            'ilce' => $request->ilce,
            'posta' => $request->posta,
            'vade' => $request->vade,
            'iskonto' => $request->iskonto,
            'tutarAcilis' => $request->tutarAcilis,
            'acilisStatus' => $request->acilisStatus,
            'islemTarihAcilis' => $request->islemTarihAcilis,
            'vadeTarihAcilis' => $request->vadeTarihAcilis,
            'tutarBorc' => $request->tutarBorc,
            'borcStatus' => $request->borcStatus,
            'islemTarihBorc' => $request->islemTarihBorc,
            'vadeTarihBorc' => $request->vadeTarihBorc,
            'description' => $request->description,
            'hesapNo' => $request->hesapNo,
            'branch' => $request->branch,
            'bank' => $request->bank,
            'iban' => $request->iban,
            'hesapName' => $request->hesapName,
            'yetkiliTel' => $request->yetkiliTel,
            'yetkiliMail' => $request->yetkiliMail,
            'yetkiliName' => $request->yetkiliName,
        ]);


        return back()->with('success', 'Cari created successfully');
    }

    public function show($id)
    {
        //
        
    }

    public function edit($id)
    {
        $car = car::find($id);

        return view('admin.cari.edit', compact('car'));
    }

    public function update(CariRequest $request, $id)
    {
        $car = Cari::find($id);
        if ($car) {
            $car->update([
                'cariStatus' => $request->cariStatus,
                'code' => $request->code,
                'name' => $request->name,
                'surname' => $request->surname,
                'type' => $request->type,
                'islemTarih' => $request->islemTarih,
                'tags' => $request->tags,
                'tckn' => $request->tckn,
                'vergiDaire' => $request->vergiDaire,
                'mersis' => $request->mersis,
                'tel' => $request->tel,
                'mail' => $request->mail,
                'web' => $request->web,
                'faks' => $request->faks,
                'adresTip' => $request->adresTip,
                'adres' => $request->adres,
                'il' => $request->il,
                'ilce' => $request->ilce,
                'posta' => $request->posta,
                'vade' => $request->vade,
                'iskonto' => $request->iskonto,
                'tutarAcilis' => $request->tutarAcilis,
                'acilisStatus' => $request->acilisStatus,
                'islemTarihAcilis' => $request->islemTarihAcilis,
                'vadeTarihAcilis' => $request->vadeTarihAcilis,
                'tutarBorc' => $request->tutarBorc,
                'borcStatus' => $request->borcStatus,
                'islemTarihBorc' => $request->islemTarihBorc,
                'vadeTarihBorc' => $request->vadeTarihBorc,
                'description' => $request->description,
                'hesapNo' => $request->hesapNo,
                'branch' => $request->branch,
                'bank' => $request->bank,
                'iban' => $request->iban,
                'hesapName' => $request->hesapName,
                'yetkiliTel' => $request->yetkiliTel,
                'yetkiliMail' => $request->yetkiliMail,
                'yetkiliName' => $request->yetkiliName,
                
            ]);
        }
            return redirect()->route('cari.index')->with('success', 'Cari updated successfully');
    }

    public function destroy($id)
    {
        $Cari = Cari::findOrFail($id);
        $Cari->delete();

        return redirect()->route('cari.index')->with('success', 'Cari deleted successfully');
    }

    public function status(Request $request)
    {
        $status = $request->cariStatus;
        $updateCheck = $status == "false" ? '0' : '1';

        Cari::where('id',$request->id)->update(['status'=> $updateCheck]);

        return response(['error'=>false,'status'=>$status]);
    }
}
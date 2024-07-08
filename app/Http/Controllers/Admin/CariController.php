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
        $cari = Cari::find($id);

        return view('admin.cari.edit', compact('cari'));
    }

    public function update(CariRequest $request, $id)
    {
        $cari = Cari::find($id);
        if ($cari) {
            $cari->update([
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
        $cariStatus = $request->cariStatus;
        $updateCheck = $cariStatus == "false" ? '0' : '1';

        Cari::where('id',$request->id)->update(['status'=> $updateCheck]);

        return response(['error'=>false,'cariStatus'=>$cariStatus]);
    }

    public function cariDetay()
    {
        return view('admin.cari.cariDetay');
    }

    public function submit(Request $request)
    {
        // Form verilerini işleyin
        $cari = $request->validate([
            'cariStatus' => 'string|max:255',
            'code' => 'string|max:255',
            'name' => 'string|max:255',
            'type' => 'string|max:255',
            'islemTarih' => 'string|max:255',
            'tags' => 'string|max:255',
            'tckn' => 'string|max:255',
            'vergiDaire' => 'string|max:255',
            'mersis' => 'string|max:255',
            'tel' => 'string|max:255',
            'mail' => 'string|max:255',
            'web' => 'string|max:255',
            'faks' => 'string|max:255',
            'adresTip' => 'string|max:255',
            'adres' => 'string|max:255',
            'il' => 'string|max:255',
            'ilce' => 'string|max:255',
            'posta' => 'string|max:255',
            'vade' => 'string|max:255',
            'iskonto' => 'string|max:255',
            'acilisStatus' => 'string|max:255',
            'islemTarihAcilis' => 'string|max:255',
            'vadeTarihAcilis' => 'string|max:255',
            'tutarBorc' => 'string|max:255',
            'borcStatus' => 'string|max:255',
            'islemTarihBorc' => 'string|max:255',
            'vadeTarihBorc' => 'string|max:255',
            'description' => 'string|max:255',
            'hesapNo' => 'string|max:255',
            'branch' => 'string|max:255',
            'bank' => 'string|max:255',
            'iban' => 'string|max:255',
            'hesapName' => 'string|max:255',
            'yetkiliTel' => 'string|max:255',
            'yetkiliMail' => 'string|max:255',
            'yetkiliName' => 'string|max:255',
        ]);

        // İşlem sonrasında bir geri dönüş yapın

    }
}
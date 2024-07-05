@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title" style="font-weight: bold">Genel Gider Yönetimi</span>
                </div>
                <div class="card-body">

                    @if($errors)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if(session()->get('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    @if(!empty($gider->id))
                        @php
                            $routeLink = route('gider.update',$gider->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('gider.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($gider->id))
                            @method('PUT')
                        @endif
                            <div class="form-group">
                            <label for="cari" class="label-spe">Cari</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <input type="text" class="form-control" id="cari" name="cari"
                                   value="{{ $gider->cari ?? '' }}" onblur="path();">
                        </div>
                        <div class="form-group mt-2">
                            <label for="cariAdres" class="label-spe">Cari Adresi</label>
                            <input type="text" class="form-control" id="cariAdres" name="cariAdres"
                                   value="{{ $gider->cariAdres ?? '' }}" onblur="path();">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group mt-2">
                            <label for="duzenlemeTarih" class="label-spe">Düzenleme Tarihi</label>
                            <input type="text" name="duzenlemeTarih" class="form-control" id="duzenlemeTarih"
                                   value="{{ $gider->duzenlemeTarih ?? '' }}" />
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seriNo" class="label-spe">Seri No</label>
                                    <div class="input-group">
                                        <input id="seriNo" name="seriNo" type="text" class="form-control" value="{!! $gider->seriNo ?? '' !!}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="giderTip" class="label-spe">Gider Tipi</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <select name="giderTip" id="giderTip" class="form-control">
                                @foreach($categories as $id=>$name)
                                    @if(!isset($selectedCategory))
                                        <option {{ in_array($id,$selectedCategory) ? selected :  null}} value="{{ $name->id }}">{{ $name->name }}</option>
                                    @else
                                        <option value="{{ $name->name }}">{{ $name->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group mt-4">
                        <a href="{{ route('category.create') }}" class="btn btn-info">Gider Tipi Ekle</a>
                        </div>
                        </div>
                        <div class="form-group mt-2 col-md-2 col-sm-6 col-xs-12">
                            <label for="odemeStatus" class="label-spe">Ödeme Durumu</label>
                            @php
                                $odemeStatus = $gider->odemeStatus ?? '';
                            @endphp
                            <select name="odemeStatus" id="odemeStatus" class="form-control">
                                <option value="1" {{ $odemeStatus == '1' ? 'selected' : '' }}>Ödenmedi</option>
                                <option value="0" {{ $odemeStatus == '0' ? 'selected' : '' }}>Tahsil Edildi</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2 d-none">
                                <label for="bankName" class="label-spe">Banka / Kasa Hesabı</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>

                                <select class="form-control" name="bankName" id="bankName">
                            @if (!is_null($account))
                                @foreach ($account as $acc)
                                    <option value="{{ $gider->bankName ?? '' }}">{{ $acc->name ?? '' }}</option>
                                @endforeach
                            @endif
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2 d-none">
                                <label for="odemeTarih" class="label-spe">Odeme Tarihi</label>
                                    <input type="text" class="form-control" name="odemeTarih" id="odemeTarih" 
                                    value="{!! $gider->odemeTarih ?? '' !!}"/>
                            </div>
                            </div>
                        <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                <label for="sonOdeme" class="label-spe">Vade Tarihi</label>
                                <select class="form-control" name="sonOdeme" id="sonOdeme">
                                    <option value="0">Vade Günü Girilmemiştir</option>
                                    <option value="7">7 Gün Vade</option>
                                    <option value="15">15 Gün Vade</option>
                                    <option value="30">30 Gün Vade</option>
                                    <option value="45">45 Gün Vade</option>
                                    <option value="60">60 Gün Vade</option>
                                    <option value="90">90 Gün Vade</option>
                                </select>
                            </div>
                            <div class="form-group mt-2 col-md-2 col-sm-6 col-xs-12" id="etiketAlani">
                                <label for="tags" class="label-spe">Etiketler</label>
                                <input type="text" name="tags" id="tags" class="form-control" value="{!! $gider->tags ?? '' !!}" />
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description" class="label-spe">Açıklama</label>
                            <input type="text" class="form-control" name="description" id="description" 
                                      placeholder="Açıklama" value="{!! $gider->description ?? '' !!}" />
                        </div>
                       
                        <div class="row mt-3 calculate">
                            
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="araToplam" class="label-spe">Ara Toplam</label>
                                <input type="text" class="form-control" name="araToplam" id="araToplam" 
                                    value="{{ $gider->araToplam ?? '' }}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="kdv" class="label-spe">KDV Oranı %</label>
                                <input type="text" class="form-control" name="kdv" id="kdv" 
                                      placeholder="0.00" value="{!! $gider->kdv ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="sumKdv" class="label-spe">Toplam KDV</label>
                                <input type="text" class="form-control" name="sumKdv" id="sumKdv" 
                                      placeholder="0.00" value="{!! $gider->sumKdv ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="incSumKdv" class="label-spe">Toplam KDV</label>
                                <input type="text" class="form-control" name="incSumKdv" id="incSumKdv" 
                                      placeholder="0.00" value="{!! $gider->incSumKdv ?? '' !!}" />
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="digerVergi" class="label-spe">Diğer Vergiler/Toplamlar</label>
                                <input type="text" class="form-control" name="digerVergi" id="digerVergi" 
                                      placeholder="0.00" value="{!! $gider->digerVergi ?? '' !!}" />
                            </div>
                         <div class="row mt-5 justify-content-end">
                         <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="faturaTutar" class="label-spe">Genel Toplam</label>
                                <input type="text" class="form-control" name="faturaTutar" id="faturaTutar" 
                                      placeholder="0.00" value="{!! $gider->faturaTutar ?? '' !!}" />
                            </div>
                         </div>
                        </div>
                        
                        <div class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('gider.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
@endsection

@section('custom_js')
<script>
        // var birimVal = 0;
        // var miktarVal = 0;
        // var birimMiktar = 0;
        // var kdvSonuc = 0;
        // var sumKdv = 0;
        // var incSumKdv = 0;

        // $(document).on('input', '#birimFiyat', function(){
        //     miktarVal = parseInt($("#miktar").val());
        //     birimVal = parseInt($("#birimFiyat").val());
        //     birimMiktar = birimVal * miktarVal;

        //     $("#excSumKdv").val(birimMiktar);
        // });

        // $(document).on('input', '#kdv', function(){
        //     var kdv = $("#kdv option:selected").val();
        //     sumKdv = birimMiktar * (kdv / 100);
        //     incSumKdv = birimMiktar + sumKdv;

        //     $("#sumKdv").val(sumKdv);
        //     $("#incSumKdv").val(incSumKdv);
        // });
    var araToplam = 0;
    var faturaTutar = 0;
    var kdv = 0;
    var sumKdv = 0;
    var incSumKdv = 0;

    // Herhangi bir input değişikliğinde çalışacak genel bir event listener
    $(document).on('input', '.calculate input:not(#incSumKdv)', function(){
        // Birim fiyat ve miktar inputlarındaki değişiklikler için
        araToplam = parseInt($("#araToplam").val()) || 0; // Varsayılan değer 0
        faturaTutar = parseInt($("#faturaTutar").val()) || 0; // Varsayılan değer 0
        digerVergi = parseInt($("#digerVergi").val()) || 0;

        // KDV inputundaki değişiklikler için
        var kdv = $("#kdv").val() || 0; // Varsayılan değer 0
        sumKdv = araToplam * (kdv / 100);
        incSumKdv = araToplam + sumKdv;
        
        digerKdv = incSumKdv + digerVergi;
        faturaTutar = digerKdv;

        $("#sumKdv").val(sumKdv);
        $("#incSumKdv").val(incSumKdv);
        $("#faturaTutar").val(faturaTutar);
    });

    $(document).on('change', '#kdv', function() {
        var kdv = $("#kdv").val() || 0;
        sumKdv = araToplam * (kdv / 100);
        incSumKdv = araToplam + sumKdv;

        $("#sumKdv").val(sumKdv);
        $("#incSumKdv").val(incSumKdv);
    });

    $(document).on('input', '#incSumKdv', function() {

        
            incSumKdv = parseFloat($("#incSumKdv").val()) || 0;
        var kdv = parseFloat($("#kdv").val()) || 0;

        sumKdv = incSumKdv / (1 + (kdv / 100)) * (kdv / 100);

        $("#sumKdv").val(sumKdv);
        
    
    });

    var input = document.querySelector('input[name=tags]');
    new Tagify(input);
             
        $( function() {
    $( "#duzenlemeTarih" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
  } );
  function getCurrentDate() {
    var now = new Date();
    var day = String(now.getDate()).padStart(2, '0');
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var year = now.getFullYear();
    return day + '/' + month + '/' + year;
}
$('#duzenlemeTarih').val(getCurrentDate());
  

    $(document).on('change', '#sonOdeme', function() {
        var sonOdeme = $("#sonOdeme option:selected").val() || 0;
        $("#sonOdeme").val(sonOdeme);
    });

    $(document).ready(function() {
    $('#odemeStatus').change(function() {
    var newStatus = $(this).val();
    if (newStatus == 0) {
        $('#bankName').parent().removeClass('d-none');
        $('#odemeTarih').parent().removeClass('d-none');
    } else if(newStatus == 1) {
        $('#bankName').parent().addClass('d-none');
        $('#odemeTarih').parent().addClass('d-none');
    }
    });
    });

    $( function() {
    $( "#odemeTarih" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
  } );
  function getCurrentDate() {
    var now = new Date();
    var day = String(now.getDate()).padStart(2, '0');
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var year = now.getFullYear();
    return day + '/' + month + '/' + year;
}
$('#odemeTarih').val(getCurrentDate());
  
</script>
@endsection
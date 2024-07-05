@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title" style="font-weight: bold">Satış Fatura</span>
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

                    @if(!empty($satis->id))
                        @php
                            $routeLink = route('satis.update',$satis->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('satis.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($satis->id))
                            @method('PUT')
                        @endif
                            <div class="form-group">
                            <label for="cari" class="label-spe">Cari</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <input type="text" class="form-control" id="cari" name="cari"
                                   value="{{ $satis->cari ?? '' }}" onblur="path();">
                        </div>
                        <div class="form-group mt-2">
                            <label for="cariAdres" class="label-spe">Cari Adresi</label>
                            <input type="text" class="form-control" id="cariAdres" name="cariAdres"
                                   value="{{ $satis->cariAdres ?? '' }}" onblur="path();">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group mt-2">
                            <label for="duzenlemeTarih" class="label-spe">Düzenleme Tarihi</label>
                            <input type="text" name="duzenlemeTarih" class="form-control" id="duzenlemeTarih"
                                   value="{{ $satis->duzenlemeTarih ?? '' }}" />
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duzenlemeSaat" class="label-spe">Düzenleme Saati</label>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input id="duzenlemeSaat" name="duzenlemeSaat" type="text" class="form-control input-small">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="seriNo" class="label-spe">Seri No</label>
                            <input type="text" class="form-control" name="seriNo" id="seriNo" 
                                    value="{!! $satis->seriNo ?? '' !!}" readonly/>
                        </div>
                        <div class="form-group mt-2 col-md-2 col-sm-6 col-xs-12">
                            <label for="odemeStatus" class="label-spe">Ödeme Durumu</label>
                            @php
                                $odemeStatus = $satis->odemeStatus ?? '';
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
                                    <option value="{{ $satis->bankName ?? '' }}">{{ $acc->name ?? '' }}</option>
                                @endforeach
                            @endif
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2 d-none">
                                <label for="odemeTarih" class="label-spe">Odeme Tarihi</label>
                                    <input type="text" class="form-control" name="odemeTarih" id="odemeTarih" 
                                    value="{!! $satis->odemeTarih ?? '' !!}"/>
                            </div>
                            </div>
                        <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                <label for="vadeTarih" class="label-spe">Vade Tarihi</label>
                                <select class="form-control" name="vadeTarih" id="vadeTarih">
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
                                <input type="text" name="tags" id="tags" class="form-control" value="{!! $satis->tags ?? '' !!}" />
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description" class="label-spe">Açıklama</label>
                            <input type="text" class="form-control" name="description" id="description" 
                                      placeholder="Açıklama" value="{!! $satis->description ?? '' !!}" />
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <label for="urunHizmet" class="label-spe">Ürün / Hizmet</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <select name="urunHizmet" id=urunHizmet" class="form-control js-example-basic-single">
                                @foreach($blogs as $id=>$name)
                                    @if(isset($selectedBlog))
                                        <option
                                            {{in_array($id,$selectedBlog) ? 'selected' : ''}} value="{{ $id }}">{{ $name }}</option>
                                    @else
                                        <option value="{{ $name->id }}">{{ $name->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group mt-3">
                        <a href="{{ route('blogs.create') }}" class="btn btn-info">Ürün / Hizmet Ekle</a>
                        </div>
                        </div>
                        <div class="row mt-3 calculate">
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="miktar" class="label-spe">Miktar</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="miktar" id="miktar" 
                                      placeholder="0.00" value="{!! $satis->miktar ?? '' !!}" />
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="birimFiyat" class="label-spe">Birim Fiyat</label>
                                <input type="text" class="form-control" name="birimFiyat" id="birimFiyat" 
                                      placeholder="0.00" value="{!! $satis->birimFiyat ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="kdv" class="label-spe">KDV Oranı</label>
                                <select class="form-control" name="kdv" id="kdv">
                                    <option value="0">KDV %0</option>
                                    <option value="1">KDV %1</option>
                                    <option value="8">KDV %8</option>
                                    <option value="10">KDV %10</option>
                                    <option value="18">KDV %18</option>
                                    <option value="20">KDV %20</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="sumKdv" class="label-spe">Toplam KDV Tutarı</label>
                                <input type="text" class="form-control" name="sumKdv" id="sumKdv" 
                                      placeholder="0.00" value="{!! $satis->sumKdv ?? '' !!}" readonly/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="excSumKdv" class="label-spe">Toplam (KDV Hariç)</label>
                                <input type="text" class="form-control" name="excSumKdv" id="excSumKdv" 
                                      placeholder="0.00" value="{!! $satis->excSumKdv ?? '' !!}" />
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="incSumKdv" class="label-spe">Toplam (KDV Dahil)</label>
                                <input type="text" class="form-control" name="incSumKdv" id="incSumKdv" 
                                      placeholder="0.00" value="{!! $satis->incSumKdv ?? '' !!}" />
                            </div>
                        </div>
                        
                        <div class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('satis.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

        var birimVal = 0;
    var miktarVal = 0;
    var birimMiktar = 0;
    var kdvSonuc = 0;
    var sumKdv = 0;
    var incSumKdv = 0;

    // Herhangi bir input değişikliğinde çalışacak genel bir event listener
    $(document).on('input', '.calculate input:not(#incSumKdv)', function(){
        // Birim fiyat ve miktar inputlarındaki değişiklikler için
        miktarVal = parseInt($("#miktar").val()) || 0; // Varsayılan değer 0
        birimVal = parseInt($("#birimFiyat").val()) || 0; // Varsayılan değer 0
        birimMiktar = birimVal * miktarVal;

        $("#excSumKdv").val(birimMiktar);

        // KDV inputundaki değişiklikler için
        var kdv = $("#kdv option:selected").val() || 0; // Varsayılan değer 0
        sumKdv = birimMiktar * (kdv / 100);
        incSumKdv = birimMiktar + sumKdv;

        $("#sumKdv").val(sumKdv);
        $("#incSumKdv").val(incSumKdv);
    });

    $(document).on('change', '#kdv', function() {
        var kdv = $("#kdv option:selected").val() || 0;
        sumKdv = birimMiktar * (kdv / 100);
        incSumKdv = birimMiktar + sumKdv;

        $("#sumKdv").val(sumKdv);
        $("#incSumKdv").val(incSumKdv);
    });

    $(document).on('input', '#incSumKdv', function() {

        if($("#miktar").val() > 0) {
            incSumKdv = parseFloat($("#incSumKdv").val()) || 0;
        var kdv = parseFloat($("#kdv option:selected").val()) || 0;

        sumKdv = incSumKdv / (1 + (kdv / 100)) * (kdv / 100);
        birimMiktar = incSumKdv - sumKdv;
        birimVal = birimMiktar / miktarVal;

        $("#sumKdv").val(sumKdv);
        $("#excSumKdv").val(birimMiktar);
        $("#birimFiyat").val(birimVal);
        }
    
    });

    var input = document.querySelector('input[name=tags]');
    new Tagify(input);

    $(document).ready(function(){
        function getCurrentTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();

            // Zamanı iki haneli olarak formatlama
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;

            return hours + ':' + minutes;
        }

        $(document).ready(function(){
            function getCurrentTime() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();

                // Zamanı iki haneli olarak formatlama
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;

                return hours + ':' + minutes;
            }

            $('#duzenlemeSaat').timepicker({
                minuteStep: 1,
                showSeconds: false,
                showMeridian: false,
                defaultTime: false
            });

            $('#duzenlemeSaat').on('input', function() {
                var value = $(this).val();
                
                // Remove any non-numeric characters except colon
                value = value.replace(/[^0-9:]/g, '');

                // Split value by colon to separate hours and minutes
                var timeParts = value.split(':');
                var hours = timeParts[0] ? timeParts[0].replace(/\D/g, '').substring(0, 2) : '';
                var minutes = timeParts[1] ? timeParts[1].replace(/\D/g, '').substring(0, 2) : '';

                // Reassemble the time value with colon
                if (hours.length == 2 && minutes.length == 0) {
                    value = hours + ':';
                } else if (hours.length == 2 && minutes.length > 0) {
                    value = hours + ':' + minutes;
                } else {
                    value = hours;
                }

                // Automatically move focus to minutes part after entering 2 digits for hours
                if (hours.length == 2 && value.length == 3 && !value.includes(':')) {
                    value += ':';
                }

                $(this).val(value);
            });

            // Auto-focus to minutes after entering 2 digits for hours
            $('#duzenlemeSaat').on('keyup', function(e) {
                var value = $(this).val();
                if (value.length == 3 && value.includes(':')) {
                    var colonPos = value.indexOf(':');
                    if (colonPos == 2) {
                        this.setSelectionRange(colonPos + 1, colonPos + 1);
                    }
                }
            });
        });

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
  
    // Sayfa yüklendiğinde mevcut saati input alanına yerleştirme
    $('#duzenlemeSaat').val(getCurrentTime());
    });

    $(document).on('change', '#vadeTarih', function() {
        var vadeTarih = $("#vadeTarih option:selected").val() || 0;
        $("#vadeTarih").val(vadeTarih);
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
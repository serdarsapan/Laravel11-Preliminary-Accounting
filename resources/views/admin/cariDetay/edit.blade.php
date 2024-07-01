@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title" style="font-weight: bold">Cari Detay Bilgileri</span>
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

                    @if(!empty($cari->id))
                        @php
                            $routeLink = route('cari.update',$cari->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('cari.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data" id="2">
                        @csrf
                        @if(!empty($cari->id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <h4 class="mb-20 ml-10 text-primary">Vade Bilgileri</h4>
                            <div class="row mb-4">
                            <div class="form-group col-md-2">
                            <label for="vade">Vade Günü</label>
                            <div>
                                <label for="yok">Yok <input type="radio" value="0" name="vade" checked/></label>
                                <label for="var">Var <input type="radio" value="1" name="vade"/></label>
                            </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group vade">
                                <label for="vade" class="label-spe">Vade Tarihi</label>
                                <select class="form-control" name="vade" id="vade">
                                    <option value="0">Vade Günü Girilmemiştir</option>
                                    <option value="7">7 Gün Vade</option>
                                    <option value="15">15 Gün Vade</option>
                                    <option value="30">30 Gün Vade</option>
                                    <option value="45">45 Gün Vade</option>
                                    <option value="60">60 Gün Vade</option>
                                    <option value="90">90 Gün Vade</option>
                                </select>
                            </div>
                            </div>

                            <h4 class="mb-20 ml-10 text-primary">Diğer Bilgiler</h4>
                            <div class="row mb-4">
                            <div class="form-group col-md-2">
                            <label for="iskonto">Sabit İskonto</label>
                            <div>
                                <label for="yok">Yok <input type="radio" value="0" name="iskonto" checked/></label>
                                <label for="var">Var <input type="radio" value="1" name="iskonto"/></label>
                            </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group iskonto">
                                <label for="iskonto" class="label-spe">Sabit İskonto</label>
                                <input type="text" class="form-control" id="iskonto" name="iskonto">
                            </div>
                            </div>

                            <h4 class="mb-20 ml-10 text-primary">Açılış Bakiyesi</h4>
                            <div class="row mb-4">
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="tutarAcilis" class="label-spe">Tutar</label>
                                <input type="text" class="form-control" name="tutarAcilis" id="tutarAcilis" 
                                      placeholder="0.00" value="{!! $satis->tutarAcilis ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                            <label for="acilisStatus" class="label-spe">Durumu</label>
                            @php
                                $acilisStatus = $cari->acilisStatus ?? '';
                            @endphp
                            <select name="acilisStatus" id="acilisStatus" class="form-control">
                                <option value="1" {{ $acilisStatus == '1' ? 'selected' : '' }}>Borcu var.</option>
                                <option value="0" {{ $acilisStatus == '0' ? 'selected' : '' }}>Alacağı var.</option>

                            </select>
                            </div>
                            <div class="row mt-2">
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="islemTarihAcilis" class="label-spe">İşlem Tarihi</label>
                                    <input type="text" class="form-control" name="islemTarihAcilis" id="islemTarihAcilis" 
                                    value="{!! $satis->islemTarihAcilis ?? '' !!}"/>
                            </div>
                            </div>
                            <div class="row mt-2">
                            <div class="form-group col-md-2">
                            <label for="vadeTarihAcilis">Vade Tarihi</label>
                            <div class="mt-2">
                                <label for="yok">Yok <input type="radio" value="0" name="vadeTarihAcilis" checked/></label>
                                <label for="var">Var <input type="radio" value="1" name="vadeTarihAcilis"/></label>
                            </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group vadeTarihAcilis">
                                <label for="vadeTarihAcilis" class="label-spe">Vade Tarihi</label>
                                <input type="text" class="form-control" name="vadeTarihAcilis" id="vadeTarihAcilis" value="{!! $cari->vadeTarihAcilis ?? '' !!}"/>
                            </div>
                            </div>
                            </div>

                            <h4 class="mb-20 ml-10 text-primary">Borç Alacak Bilgileri</h4>
                            <div class="row mb-4">
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="tutarBorc" class="label-spe">Tutar</label>
                                <input type="text" class="form-control" name="tutarBorc" id="tutarBorc" 
                                      placeholder="0.00" value="{!! $satis->tutarBorc ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                            <label for="borcStatus" class="label-spe">Durumu</label>
                            @php
                                $borcStatus = $cari->borcStatus ?? '';
                            @endphp
                            <select name="borcStatus" id="borcStatus" class="form-control">
                                <option value="1" {{ $borcStatus == '1' ? 'selected' : '' }}>Borcu var.</option>
                                <option value="0" {{ $borcStatus == '0' ? 'selected' : '' }}>Alacağı var.</option>

                            </select>
                            </div>
                            <div class="row mt-2">
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="islemTarihBorc" class="label-spe">İşlem Tarihi</label>
                                    <input type="text" class="form-control" name="islemTarihBorc" id="islemTarihBorc" 
                                    value="{!! $satis->islemTarihBorc ?? '' !!}"/>
                            </div>
                            </div>
                            <div class="row mt-2">
                            <div class="form-group col-md-2">
                            <label for="vadeTarihBorc">Vade Tarihi</label>
                            <div class="mt-2">
                                <label for="yok">Yok <input type="radio" value="0" name="vadeTarihBorc" checked/></label>
                                <label for="var">Var <input type="radio" value="1" name="vadeTarihBorc"/></label>
                            </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group vadeTarihBorc">
                                <label for="vadeTarihBorc" class="label-spe">Vade Tarihi</label>
                                <input type="text" class="form-control" name="vadeTarihBorc" id="vadeTarihBorc" value="{!! $cari->vadeTarihBorc ?? '' !!}"/>
                            </div>
                            </div>
                            </div>

                            <h4 class="mb-20 ml-10 text-primary">Banka Bilgileri</h4>
                            <div class="row mb-4">
                            <div class="form-group col-md-4">
                            <div id="s">
                                <label for="yok"><input type="radio" value="0" name="banks" checked/> Hesap Numarası</label>
                                <label for="var"><input type="radio" value="1" name="banks"/> IBAN</label>
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <label for="hesapName" class="label-spe">Hesap Adı</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" id="hesapName" name="hesapName" value="{{ $cari->hesapName ?? '' }}" onblur="path();">
                            </div>
                            <div class="row hesaps">
                            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                <label for="bank" class="label-spe">Banka</label>
                                <input type="text" class="form-control" name="bank" id="bank" value="{!! $cari->bank ?? '' !!}"/>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                <label for="branch" class="label-spe">Şube</label>
                                <input type="text" class="form-control" name="branch" id="branch" value="{!! $cari->branch ?? '' !!}"/>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                <label for="hesapNo" class="label-spe">Hesap No</label>
                                <input type="text" class="form-control" name="hesapNo" id="hesapNo" value="{!! $cari->hesapNo ?? '' !!}"/>
                            </div>
                            </div>
                            <div class="row ibans">
                            <div class="form-group">
                                <label for="iban" class="label-spe">IBAN</label>
                                <input type="text" class="form-control" name="iban" id="iban" value="{!! $cari->iban ?? '' !!}"/>
                            </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description" class="label-spe">Açıklama</label>
                                <input type="text" class="form-control" name="description" id="description" value="{!! $cari->description ?? '' !!}"/>
                            </div>
                            </div>
                            </div>

                            <h4 class="mb-20 ml-10 text-primary">Yetkili İletişim Bilgileri</h4>
                            <div class="row mb-4">
                                <div class="col-md-3 col-sm-6 col-xs-12 form-group mt-2">
                                    <label for="yetkiliName" class="label-spe">Ad</label>
                                    <input type="text" class="form-control" id="yetkiliName" name="yetkiliName" value="{{ $cari->yetkiliName ?? '' }}" onblur="path();">
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                    <label for="yetkiliMail" class="label-spe">E-Posta</label>
                                    <input type="text" class="form-control" name="yetkiliMail" id="yetkiliMail" value="{!! $cari->yetkiliMail ?? '' !!}"/>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                    <label for="yetkiliTel" class="label-spe">Telefon No</label>
                                    <input type="text" class="form-control" name="yetkiliTel" id="yetkiliTel" value="{!! $cari->yetkiliTel ?? '' !!}"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="javascript:history.back()" class="btn btn-danger">Previous</a>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('cari.index') }}" class="btn btn-light">Cancel</a>
                                    </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
<script>
   $(function() {
    $("#islemTarih").datepicker({
        dateFormat: 'dd/mm/yy'
    });
});

$( function() {
    $( "#islemTarihAcilis" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
});
$('#islemTarihAcilis').val(getCurrentDate());
$( function() {
    $( "#vadeTarihAcilis" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
});
$('#vadeTarihAcilis').val(getCurrentDate());

$( function() {
    $( "#islemTarihBorc" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
});
$('#islemTarihBorc').val(getCurrentDate());

$( function() {
    $( "#vadeTarihBorc" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
});
$('#vadeTarihBorc').val(getCurrentDate());

$(document).ready(function() {
            $('.iskonto').hide();
        $('input[name="iskonto"]').change(function() {
                if ($(this).val() == '0') {
                    $('.iskonto').hide();
                }
                if ($(this).val() == '1') {
                    $('.iskonto').show();
                }
            });
        });
        $(document).ready(function() {
            $('.vade').hide();
        $('input[name="vade"]').change(function() {
                if ($(this).val() == '0') {
                    $('.vade').hide();
                }
                if ($(this).val() == '1') {
                    $('.vade').show();
                }
            });
        });
        $(document).ready(function() {
            $('.vadeTarihAcilis').hide();
        $('input[name="vadeTarihAcilis"]').change(function() {
                if ($(this).val() == '0') {
                    $('.vadeTarihAcilis').hide();
                }
                if ($(this).val() == '1') {
                    $('.vadeTarihAcilis').show();
                }
            });
        });
        $(document).ready(function() {
            $('.vadeTarihBorc').hide();
        $('input[name="vadeTarihBorc"]').change(function() {
                if ($(this).val() == '0') {
                    $('.vadeTarihBorc').hide();
                }
                if ($(this).val() == '1') {
                    $('.vadeTarihBorc').show();
                }
            });
        });
function getCurrentDate() {
    var now = new Date();
    var day = String(now.getDate()).padStart(2, '0');
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var year = now.getFullYear();
    return day + '/' + month + '/' + year;
}
$('#islemTarih').val(getCurrentDate());

    var input = document.querySelector('input[name=tags]');
    new Tagify(input);

    $(document).ready(function() {
            $('.ibans').hide();
        $('input[name="banks"]').change(function() {
                if ($(this).val() == '0') {
                    $('.ibans').hide();
                    $('.hesaps').show();
                }
                if ($(this).val() == '1') {
                    $('.ibans').show();
                    $('.hesaps').hide();
                }
            });
        });
</script>
@endsection
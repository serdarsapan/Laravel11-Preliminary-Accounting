@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title" style="font-weight: bold">Yeni Genel Cari</span>
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
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($cari->id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            @php
                            $cariStatus = $cari->cariStatus ?? '';
                            @endphp
                        <div class="form-group col-md-2">
                            <label for="cariStatus" class="mb-20 ml-10 text-primary">Cari Türü</label>
                            <select name="cariStatus" id="cariStatus" class="form-control">
                                <option value="1" {{ $cariStatus == '1' ? 'selected' : '' }}>Gerçek/Şahıs Şirketi</option>
                                <option value="0" {{ $cariStatus == '0' ? 'selected' : '' }}>Tüzel</option>
                            </select>
                        </div>
                        <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="code" class="label-spe">Cari Kodu</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <input type="text" class="form-control" id="code" name="code"
                                   value="{{ $cari->code ?? '' }}" onblur="path();">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="name" class="label-spe">Cari Adı</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $cari->name ?? '' }}" onblur="path();">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="surname" class="label-spe">Cari Soyad</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <input type="text" class="form-control" id="surname" name="surname"
                                   value="{{ $cari->surname ?? '' }}" onblur="path();">
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                <label for="type" class="label-spe">Cari Tipi</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <select class="form-control" name="type" id="type">
                                    <option value="musteri">Müşteri</option>
                                    <option value="tedarikci">Tedarikçi</option>
                                    <option value="musteri/tedarikci">Müşteri / Tedarikçi</option>
                                    <option value="yurtdisi">Yurt Dışı</option>
                                    <option value="broker">Broker</option>
                                    <option value="kamuKurulusu">Kamu Kuruluşu</option>
                                    <option value="musteri/nakliyeci">Müşteri / Nakliyeci</option>
                                </select>
                            </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="islemTarih" class="label-spe">İşlem Tarihi</label>
                            <input type="text" class="form-control" name="islemTarih" id="islemTarih" value="{!! $cari->islemTarih ?? '' !!}"/>
                        </div>
                        </div>
                        <div class="row mt-2">
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="tags" class="label-spe">Etiketler</label>
                            <input type="text" class="form-control" name="tags" id="tags" value="{!! $cari->tags ?? '' !!}"/>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="tckn" class="label-spe">T.C. Kimlik No</label>
                            <input type="text" class="form-control" name="tckn" id="tckn" value="{!! $cari->tckn ?? '' !!}"/>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="vergiNo" class="label-spe">Vergi No</label>
                            <input type="text" class="form-control" name="vergiNo" id="vergiNo" value="{!! $cari->vergiNo ?? '' !!}"/>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="vergiDaire" class="label-spe">Vergi Dairesi</label>
                            <input type="text" class="form-control" name="vergiDaire" id="vergiDaire" value="{!! $cari->vergiDaire ?? '' !!}"/>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="mersis" class="label-spe">Mersis No</label>
                            <input type="text" class="form-control" name="mersis" id="mersis" value="{!! $cari->mersis ?? '' !!}"/>
                        </div>
                        </div>
                       <hr class="mt-3">
                        
                       <h4 class="mb-20 ml-10 text-primary">İletişim Bilgileri</h4>
                       <div class="row">
                       <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="tel" class="label-spe">Telefon No</label>
                            <input type="text" class="form-control" name="tel" id="tel" value="{!! $cari->tel ?? '' !!}"/>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="mail" class="label-spe">E-Posta</label>
                            <input type="text" class="form-control" name="mail" id="mail" value="{!! $cari->mail ?? '' !!}"/>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="web" class="label-spe">Web Sitesi</label>
                            <input type="text" class="form-control" name="web" id="web" value="{!! $cari->web ?? '' !!}"/>
                        </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="faks" class="label-spe">Faks No</label>
                            <input type="text" class="form-control" name="faks" id="faks" value="{!! $cari->faks ?? '' !!}"/>
                        </div>
                       </div>
                       <hr class="mt-3">
                       <h4 class="mb-20 ml-10 text-primary">Adres Bilgileri</h4>
                       <div class="row">
                       <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                <label for="adresTip" class="label-spe">Adres Tipi</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <select class="form-control" name="adresTip" id="adresTip">
                                    <option value="irsaliye">İrsaliye Adresi</option>
                                    <option value="fatura">Fatura Adresi</option>
                                    <option value="teslimat">Teslimat Adresi</option>
                                    <option value="depo">Depo Adresi</option>
                                    <option value="sirket">Şirket Adresi</option>
                                    <option value="cari">Cari Adresi</option>
                                    <option value="diger">Diğer</option>
                                </select>
                            </div>
                       <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="adres" class="label-spe">Adres</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <textarea type="text" class="form-control" name="adres" id="adres" value="{!! $cari->adres ?? '' !!}"></textarea>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                <label for="il" class="label-spe">İl</label>
                                <select class="form-control" name="il" id="il">
                                    <option value="musteri"></option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                                <label for="ilce" class="label-spe">İlçe</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <select class="form-control" name="ilce" id="ilce">
                                    <option value="musteri"></option>
                                </select>
                            </div>
                    
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="posta" class="label-spe">Posta Kodu</label>
                            <input type="text" class="form-control" name="posta" id="posta" value="{!! $cari->posta ?? '' !!}"/>
                        </div>
                        </div>
                      <!--  <div class="form-group mt-2">
                            <label for="status" class="label-spe">Status</label>
                            @php
                                $status = $cari->status ?? '';
                            @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Passive</option>

                            </select>
                        </div> -->
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="redirectToNextPage(event)">Cari Detay</button>
                            <a href="{{ route('cari.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
<script>

function redirectToNextPage(event) {
            event.preventDefault(); // Formun submit edilmesini engeller
            window.location.href = "cariDetay"; // Yönlendirmek istediğiniz sayfanın URL'si
        }

   $(function() {
    $("#islemTarih").datepicker({
        dateFormat: 'dd/mm/yy'
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
</script>
@endsection
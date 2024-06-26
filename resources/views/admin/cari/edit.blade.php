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

                    @if(!empty($car->id))
                        @php
                            $routeLink = route('cari.update',$car->id);
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
                            <label for="cariStatus">Cari Türü</label>
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
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="name" class="label-spe">Cari Adı</label>
                            <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $cari->name ?? '' }}" onblur="path();">
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
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
                            <label for="vergiDaire" class="label-spe">Vergi Dairesi</label>
                            <input type="text" class="form-control" name="vergiDaire" id="vergiDaire" value="{!! $cari->vergiDaire ?? '' !!}"/>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2">
                            <label for="mersis" class="label-spe">Mersis No</label>
                            <input type="text" class="form-control" name="mersis" id="mersis" value="{!! $cari->mersis ?? '' !!}"/>
                        </div>
                        </div>
                       
                        
                        
                       
                    
                        <div class="form-group mt-2">
                            <label for="branch" class="label-spe">Şube</label>
                            <input type="text" class="form-control" name="branch" id="branch" value="{!! $cari->branch ?? '' !!}"/>
                        </div>
                        <div class="form-group mt-2">
                            <label for="accNo" class="label-spe">Hesap No</label>
                            <input type="text" class="form-control" name="accountNo" id="accountNo" value="{!! $cari->accountNo ?? '' !!}"/>
                        </div>
                        
                        <div class="form-group mt-2 d-none">
                            <label for="iban" class="label-spe">IBAN</label>
                            <input type="text" class="form-control" name="iban" id="iban" value="{!! $cari->iban ?? '' !!}"/>
                        </div>
                    
                    <div class="form-group mt-2">
                            <label for="description" class="label-spe">Açıklama</label>
                            <input type="text" class="form-control" name="description" id="description" value="{!! $cari->description ?? '' !!}"/>
                        </div>
                    <div class="form-group mt-2">
                            <label for="status" class="label-spe">Status</label>
                            @php
                                $status = $cari->status ?? '';
                            @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Passive</option>

                            </select>
                        </div>
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
   $(function() {
    $("#duzenlemeTarih").datepicker({
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

    $(document).ready(function() {
    $('#status').change(function() {
    var newStatus = $(this).val();
    if (newStatus == 0) {
        $('#bankName').parent().addClass('d-none');
        $('#branch').parent().addClass('d-none');
        $('#accountNo').parent().addClass('d-none');
        $('#iban').parent().removeClass('d-none');
    } else if(newStatus == 1) {
        $('#bankName').parent().removeClass('d-none');
        $('#branch').parent().removeClass('d-none');
        $('#accountNo').parent().removeClass('d-none');
        $('#iban').parent().addClass('d-none');
    }
});
});

</script>
@endsection
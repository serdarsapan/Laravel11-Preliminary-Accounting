@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title mb-20 ml-10 text-warning" style="font-weight: bold">Ürün ve Hizmetler</span>
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

                    @if(!empty($blogs->id))
                        @php
                            $routeLink = route('blogs.update',$blog->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('blogs.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($blog->id))
                            @method('PUT')
                        @endif

                     
                        <div class="row mt-2">
                            <div class="form-group">
                                <div class="btn-group hzmUrn">
                                    <label for="urun" id="urun" value="0" class="btn btn-primary active">Ürün</label>
                                    <label for="hizmet" id="hizmet" value="1" class="btn btn-primary">Hizmet</label>
                                </div>
                            </div>
                    
                            <!-- ÜRÜN -->
                            <div class="form-group col-md-2 mt-2" id="code">
                                <label for="ürünKodu" class="label-spe">Ürün Kodu</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="code" id="code" value="{!! $blog->code ?? '' !!}"/>
                            </div>
                            <div class="form-group col-md-4 mt-2" id="name">
                                <label for="name" class="label-spe">Ürün Adı</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $blog->name ?? '' }}" />
                            </div>
                            <div class="form-group col-md-2 mt-2" id="barcode">
                            <label for="barcode" class="label-spe">Barkod</label>
                            <input type="text" name="barcode" class="form-control" id="barcode" value="{{ $blog->barcode ?? '' }}" />
                            <small id="barkodOluştur" class="text-primary">Barkod Oluştur</small>
                            </div>
                            <div class="form-group col-md-2 mt-2" id="tags">
                                <label for="tags" class="label-spe">Etiketler</label>
                                <input type="text" name="tags" class="form-control" id="tags" value="{{ $blog->tags ?? '' }}" />
                            </div>
                        <div class="row">
                            <div class="form-group col-md-2 mt-2" id="origin">
                                <label for="origin" class="label-spe">Menşei</label>
                                <input type="text" class="form-control" name="origin" id="origin" value="{!! $blog->origin ?? '' !!}"/>
                            </div>
                            <div class="form-group col-md-2 mt-2" id="gtip">
                                <label for="gtip" class="label-spe">GTIP No</label>
                                <input type="text" class="form-control" name="gtip" id="gtip" value="{!! $blog->gtip ?? '' !!}"/>
                            </div>
                            <div class="form-group col-md-4 mt-2" id="description">
                                <label for="description" class="label-spe">Açıklama</label>
                                <input type="text" class="form-control" name="description" id="description" value="{!! $blog->description ?? '' !!}" />
                            </div>
                        </div>

                        <!-- HİZMET -->
                        <div class="row">
                        <div class="form-group col-md-2 mt-2 d-none" id="hzmCode">
                                <label for="hzmCode" class="label-spe">Hizmet Kodu</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="hzmCode" id="hzmCode" value="{!! $blog->hzmCode ?? '' !!}"/>
                            </div>
                            <div class="form-group col-md-4 mt-2 d-none" id="hzmName">
                                <label for="hzmName" class="label-spe">Hizmet Adı</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" id="hzmName" name="hzmName" value="{{ $blog->hzmName ?? '' }}" />
                            </div>
                            <div class="form-group col-md-2 mt-2 d-none" id="hzmBarcode">
                            <label for="hzmBarcode" class="label-spe">Barkod</label>
                            <input type="text" name="hzmBarcode" class="form-control" id="hzmBarcode" value="{{ $blog->hzmBarcode ?? '' }}" />
                            <small id="barkodOluştur" class="text-primary">Barkod Oluştur</small>
                            </div>
                            <div class="form-group col-md-2 mt-2 d-none" id="hzmTags">
                                <label for="hzmTags" class="label-spe">Etiketler</label>
                                <input type="text" name="hzmTags" class="form-control" id="hzmTags" value="{{ $blog->hzmTags ?? '' }}" />
                            </div>
                            </div>
                            <div class="form-group col-md-4 mt-2 d-none" id="hzmDescription">
                                <label for="hzmDescription" class="label-spe">Açıklama</label>
                                <input type="text" class="form-control" name="hzmDescription" id="hzmDescription" value="{!! $blog->hzmDescription ?? '' !!}" />
                            </div>
                        </div>

                        <!-- 
                         <div class="row">
                            <div class="form-group mt-5">
                                    <label for="stokTakibi" class="label-spe">Stok Takibi</label>
                                    <div class="row">
                                        <div class="mb-5 col-xs-12">
                                            <input type="radio">
                                            <label for="yapılmasın" class="checkbox-inline">Yapılmasın</label>
                                            <input type="radio">
                                            <label for="yapılsın" class="checkbox-inline">Yapılsın</label>
                                        </div>
                                    </div>
                            </div>
                        </div> 
                        -->

                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-primary">Fiyat</button>
                            <i class="fa fa-arrow-left"></i>
                        </div>
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-start gap-2">
                            <button type="button" class="btn btn-primary">Bilgiler</button>
                            <i class="fa fa-arrow-left"></i>
                        </div>

                        <div class="row">

                        <h4 class="mb-20 ml-10 text-primary">Satış ve Satın Alma Bilgileri</h4>

                        <div class="form-group col-md-2">
                            <label for="satınAlma">Satın Alma</label>
                            <div>
                                <label for="yok">Yok <input type="radio" value="0" name="satınAlma" checked/></label>
                                <label for="var">Var <input type="radio" value="1" name="satınAlma"/></label>
                            </div>
                        </div>
                        
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2 calculateAl">
                                <label for="alisFiyat" class="label-spe">Satın Alma Fiyatı</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="alisFiyat" id="alisFiyat" 
                                      placeholder="0.00" value="{!! $blog->alisFiyat ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2 calculateAl">
                                <label for="incSumKdvAl" class="label-spe">KDV Dahil</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="incSumKdvAl" id="incSumKdvAl" 
                                      placeholder="0.00" value="{!! $blog->incSumKdvAl ?? '' !!}" readonly/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-2 calculateAl">
                                <label for="excSumKdvAl" class="label-spe">KDV Hariç</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="excSumKdvAl" id="excSumKdvAl" 
                                      placeholder="0.00" value="{!! $blog->excSumKdvAl ?? '' !!}" readonly/>
                            </div>
                            </div>
                            <div class="row">

                            <div class="form-group col-md-2">
                            <label for="satis">Satış</label>
                            <div>
                            <label for="yok">Yok <input type="radio" value="0" name="satis" checked></label>
                                <label for="var">Var <input type="radio" value="1" name="satis"></label>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-4 calculate">
                                <label for="satisFiyat" class="label-spe">Satış Fiyatı</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="satisFiyat" id="satisFiyat" 
                                      placeholder="0.00" value="{!! $blog->satisFiyat ?? '' !!}"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-4 calculate">
                                <label for="incSumKdv" class="label-spe">KDV Dahil</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="incSumKdv" id="incSumKdv" 
                                      placeholder="0.00" value="{!! $blog->incSumKdv ?? '' !!}" readonly/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group mt-4 calculate">
                                <label for="excSumKdv" class="label-spe">KDV Hariç</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                <input type="text" class="form-control" name="excSumKdv" id="excSumKdv" 
                                      placeholder="0.00" value="{!! $blog->excSumKdv ?? '' !!}" readonly/>
                            </div>
                            </div>
                            <div class="row mt-5">
                            <h4 class="mb-20 ml-10 text-primary">Vergi ve İndirim Bilgileri</h4>
                            <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="kdv" class="label-spe">Vergi</label>
                                <sup style="font-style: normal; font-weight: bold; color: #428bca">*</sup>
                                    <select class="form-control" name="kdv" id="kdv">
                                        <option value="0">KDV %0</option>
                                        <option value="1">KDV %1</option>
                                        <option value="10">KDV %10</option>
                                        <option value="20">KDV %20</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                <label for="discount" class="label-spe">İndirim</label>
                                <input type="text" class="form-control" name="discount" id="discount" 
                                      placeholder="0.00" value="{!! $blog->discount ?? '' !!}" />
                            </div>
                            </div>

                            </div>
                        
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                 
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
<script>
    document.getElementById('barkodOluştur').onclick = function() {
        var barcodeInput = document.getElementById('barcode');
        barcodeInput.value = 'testss';
    };

    var input = document.querySelector('input[name=tags]');
    new Tagify(input);

    $(document).ready(function() {
        $('#urun, #hizmet').click(function() {
            $('#urun, #hizmet').removeClass('active btn-light');
            $(this).addClass('active btn-light');
        });
    });

    $(document).ready(function() {
            $('#hizmet').click(function() {
                $('#hizmet').addClass('active');
                $('#urun').removeClass('active');
                $('#hzmCode, #hzmName, #hzmBarcode, #hzmTags, #hzmDescription').removeClass('d-none');
                $('#code, #name, #barcode, #tags, #origin, #gtip, #description').addClass('d-none');
            });

            $('#urun').click(function() {
                $('#urun').addClass('active');
                $('#hizmet').removeClass('active');
                $('#code, #name, #barcode, #tags, #origin, #gtip, #description').removeClass('d-none');
                $('#hzmCode, #hzmName, #hzmBarcode, #hzmTags, #hzmDescription').addClass('d-none');
            });
        });

        var birimVal = 0;
        var incSumKdv = 0;
        var miktarVal = 1; // Varsayılan miktar 1 olarak belirlendi

        // Herhangi bir input değişikliğinde çalışacak genel bir event listener
        $(document).on('input', '.calculate input:not(#incSumKdv)', function() {
            birimVal = parseFloat($("#satisFiyat").val()) || 0; // Varsayılan değer 0

            $("#excSumKdv").val(birimVal);

            var kdv = parseFloat($("#kdv option:selected").val()) || 0; // Varsayılan değer 0
            var sumKdv = birimVal * (kdv / 100);
            incSumKdv = birimVal + sumKdv;

            $("#incSumKdv").val(incSumKdv);
        });

        // KDV oranı değiştiğinde çalışacak event listener
        $(document).on('change', '#kdv', function() {
            var kdv = parseFloat($("#kdv option:selected").val()) || 0;
            var sumKdv = birimVal * (kdv / 100);
            incSumKdv = birimVal + sumKdv;

            $("#incSumKdv").val(incSumKdv);
        });

        // KDV Dahil Toplam inputunda değişiklik yapıldığında çalışacak event listener
        $(document).on('input', '#incSumKdv', function() {
            incSumKdv = parseFloat($("#incSumKdv").val()) || 0;

            var kdv = parseFloat($("#kdv option:selected").val()) || 0;

            var sumKdv = incSumKdv / (1 + (kdv / 100)) * (kdv / 100);
            var birimMiktar = incSumKdv - sumKdv;
            birimVal = birimMiktar / miktarVal;

            $("#excSumKdv").val(birimVal);
            $("#satisFiyat").val(birimVal);
        });


           var birimValAl = 0;
        var incSumKdvAl = 0;
        var miktarValAl = 1; // Varsayılan miktar 1 olarak belirlendi

        // Herhangi bir input değişikliğinde çalışacak genel bir event listener
        $(document).on('input', '.calculateAl input:not(#incSumKdvAl)', function() {
            birimValAl = parseFloat($("#alisFiyat").val()) || 0; // Varsayılan değer 0

            $("#excSumKdvAl").val(birimValAl);

            var kdvAl = parseFloat($("#kdv option:selected").val()) || 0; // Varsayılan değer 0
            var sumKdvAl = birimValAl * (kdvAl / 100);
            incSumKdvAl = birimValAl + sumKdvAl;

            $("#incSumKdvAl").val(incSumKdvAl);
        });

        // KDV oranı değiştiğinde çalışacak event listener
        $(document).on('change', '#kdv', function() {
            var kdvAl = parseFloat($("#kdv option:selected").val()) || 0;
            var sumKdvAl = birimValAl * (kdvAl / 100);
            incSumKdvAl = birimValAl + sumKdvAl;

            $("#incSumKdvAl").val(incSumKdvAl);
        });

        // KDV Dahil Toplam inputunda değişiklik yapıldığında çalışacak event listener
        $(document).on('input', '#incSumKdvAl', function() {
            incSumKdvAl = parseFloat($("#incSumKdvAl").val()) || 0;

            var kdvAl = parseFloat($("#kdv option:selected").val()) || 0;

            var sumKdvAl = incSumKdvAl / (1 + (kdvAl / 100)) * (kdvAl / 100);
            var birimMiktarAl = incSumKdvAl - sumKdvAl;
            birimValAl = birimMiktarAl / miktarValAl;

            $("#excSumKdvAl").val(birimValAl);
            $("#alisFiyat").val(birimValAl);
        });

        $(document).ready(function() {
            $('.calculateAl').hide();
        $('input[name="satınAlma"]').change(function() {
                if ($(this).val() == '0') {
                    $('.calculateAl').hide();
                }
                if ($(this).val() == '1') {
                    $('.calculateAl').show();
                }
            });
        });
        $(document).ready(function() {
            $('.calculate').hide();
        $('input[name="satis"]').change(function() {
                if ($(this).val() == '0') {
                    $('.calculate').hide();
                }
                if ($(this).val() == '1') {
                    $('.calculate').show();
                }
            });
        });
</script>
@endsection
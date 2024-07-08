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

        @include('admin.cari.edit') <!-- İlk Blade view -->
        @include('admin.cari.cariDetay') <!-- İkinci Blade view -->

    </form>
    </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
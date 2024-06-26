@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Genel Cari Hesapları</h4>
                    <span class="card-description">
                        <a href="{{ route('cari.create') }}" class="btn btn-primary">Cari Oluştur</a>
                    </span>
                </div>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kod</th>
                                <th>Unvan</th>
                                <th>Cari Tipi</th>
                                <th>Telefon Numarası</th>
                                <th>Etiketler</th>
                                <th>VKN/TCKN</th>
                                <th>Yerel Bakiye</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($cari) && $cari->count() > 0)
                                @foreach($cari as $car)
                                    <tr class="item">
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->tags }}</td>
                                        <td>{{ $car->bankName }} {{ $car->branch }}</td>
                                        <td>{{ $car->iban }}</td>
                                        <td>{{ $car->oDate }}</td>
                                        <td>{{ $car->currency }}</td>
                                        <td>{{ $car->balance }}</td>
                                        
                                        <td><a href="{{ route('cari.edit', $car->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('cari.destroy', $car->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger bg-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Satın Alma Yönetimi</h4>
                    <span class="card-description">
                        <a href="{{ route('alis.create') }}" class="btn btn-primary">Satın Alma</a>
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
                                <th>Cari Bilgisi</th>
                                <th>Etiketler</th>
                                <th>Seri NO</th>
                                <th>Düzenleme Tarihi</th>
                                <th>Vade Tarihi</th>
                                <th>Açıklama</th>
                                <th>Ödeme Durumu</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($alis) && $alis->count() > 0)
                                @foreach($alis as $alis)
                                    <tr class="item">
                                        <td>{{ $alis->cari }}</td>
                                        <td>{{ $alis->tags }}</td>
                                        <td>{{ $alis->seriNo }}</td>
                                        <td>{{ $alis->duzenlemeTarih }}</td>
                                        <td>{{ $alis->vadeTarih }} Gün Vade</td>
                                        <td>{{ $alis->description }}</td>
                                        <td><div class="checkbox">
                                                <label>
                                                    {{ $alis->odemeStatus == '0' ? 'Tahsil Edildi' : 'Ödenmedi' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('alis.edit', $alis->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('alis.destroy', $alis->id) }}" method="POST">
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
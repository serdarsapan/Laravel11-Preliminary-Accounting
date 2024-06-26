@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Genel Gider Yönetimi</h4>
                    <span class="card-description">
                        <a href="{{ route('gider.create') }}" class="btn btn-primary">Gider Yönetimi</a>
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
                                <th>Gider Tipi</th>
                                <th>Seri NO</th>
                                <th>Düzenleme Tarihi</th>
                                <th>Son Ödeme Tarihi</th>
                                <th>Fatura Tutarı</th>
                                <th>Takip Tutarı</th>
                                <th>Bakiye</th>
                                <th>Ödeme Durumu</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($gider) && $gider->count() > 0)
                                @foreach($gider as $gid)
                                    <tr class="item">
                                        <td>{{ $gid->cari }}</td>
                                        <td>{{ $gid->tags }}</td>
                                        <td>{{ $gid->giderTip }}</td>
                                        <td>{{ $gid->seriNo }}</td>
                                        <td>{{ $gid->duzenlemeTarih }}</td>
                                        <td>{{ $gid->sonOdeme }} Gün Vade</td>
                                        <td>{{ $gid->faturaTutar }}</td>
                                        <td>{{ $gid->takipTutar }}</td>
                                        <td>{{ $gid->bakiye }}</td>
                                        <td><div class="checkbox">
                                                <label>
                                                    {{ $gid->odemeStatus == '0' ? 'Tahsil Edildi' : 'Ödenmedi' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('gider.edit', $gider->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('gider.destroy', $gider->id) }}" method="POST">
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
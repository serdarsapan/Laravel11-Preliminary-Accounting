@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Ürün ve Hizmetler</h4>
                    <span class="card-description">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Ürün/Hizmet Ekle</a>
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
                                <th>Tür</th>
                                <th>Barkod</th>
                                <th>Kod</th>
                                <th>Ad</th>
                                <th>Stok Kullanım</th>
                                <th>Etiketler</th>
                                <th>KDV</th>
                                <th>Menşei</th>
                                <th>Açıklama</th>
                                <th>Kalan Stok Miktarı</th>
                                <th>Stok Durumu</th>
                                <th>Toplam Çıkış Bakiye</th>
                                <th>Toplam Giriş Bakiye</th>
                                <th>Ortalama Birim Maliyet</th>
                                <th>Statü</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($blogs) && $blogs->count() > 0)
                                @foreach($blogs as $blog)
                                    <tr class="item">
                                        <td>{{ $blog->bankName }}</td>
                                        <td>{{ $blog->tags }}</td>
                                        <td>{{ $blog->branch }}</td>
                                        <td>{{ $blog->iban }}</td>
                                        <td>{{ $blog->oDate }}</td>
                                        <td>{{ $blog->currency }}</td>
                                        <td>{{ $blog->balance }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    {{ $blog->status == '1' ? 'Active' : 'Passive' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
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
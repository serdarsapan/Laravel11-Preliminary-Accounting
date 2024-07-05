@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Banka Hesapları</h4>
                    <span class="card-description">
                        <a href="{{ route('accounts.create') }}" class="btn btn-primary">Hesap Ekle</a>
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
                                <th>Banka Adı</th>
                                <th>Etiketler</th>
                                <th>Banka - Şube</th>
                                <th>IBAN</th>
                                <th>Açılış Tarihi</th>
                                <th>Bakiye</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($accounts) && $accounts->count() > 0)
                                @foreach($accounts as $account)
                                    <tr class="item">
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->tags }}</td>
                                        <td>{{ $account->bankName }} {{ $account->branch }}</td>
                                        <td>{{ $account->iban }}</td>
                                        <td>{{ $account->oDate }}</td>
                                        <td>{{ $account->balance ?? '-' }} {{ $account->currency }}</td>
                                        
                                        <td><a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
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
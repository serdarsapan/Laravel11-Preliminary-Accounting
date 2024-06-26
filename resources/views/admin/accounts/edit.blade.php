@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span class="card-title" style="font-weight: bold">Yeni Banka Hesabı</span>
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

                    @if(!empty($account->id))
                        @php
                            $routeLink = route('accounts.update',$account->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('accounts.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($account->id))
                            @method('PUT')
                        @endif

                        <div class="row">
                        <div class="form-group mt-2 col-md-8">
                            <label for="name" class="label-spe">Ad</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $account->name ?? '' }}" />
                        </div>
                        <div class="form-group mt-2 col-md-4">
                            <label for="tags" class="label-spe">Etiketler</label>
                            <input type="text" class="form-control" name="tags" id="tags"
                             value="{!! $account->tags ?? '' !!}"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group mt-4 col-md-4">
                            <label for="oDate" class="label-spe">Açılış Tarihi</label>
                            <input type="text" class="form-control" name="oDate" id="oDate" value="{!! $account->oDate ?? '' !!}"/>
                        </div>
                        <div class="form-group mt-4 col-md-4">
                            <label for="balance" class="label-spe">Bakiye</label>
                            <input type="text" class="form-control" name="balance" id="balance" value="{!! $account->balance ?? '' !!}"/>
                        </div>
                        <div class="form-group mt-4 col-md-4">
                            <label for="currency" class="label-spe">Para Birimi</label>
                            <input type="text" class="form-control" name="currency" id="currency" value="{!! $account->currency ?? 'TL' !!}" readonly/>
                        </div>
                        </div>
                        <div class="form-group mt-2 col-md-2">
                            <label for="status" class="label-spe">Status</label>
                            @php
                                $status = $account->status ?? '';
                            @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Hesap Numarası</option>
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>IBAN</option>

                            </select>
                        </div>
                        <div class="row">
                        <div class="form-group mt-2 col-md-4">
                            <label for="bankName" class="label-spe">Banka</label>
                            <input type="text" class="form-control" name="bankName" id="bankName" value="{!! $account->bankName ?? '' !!}"/>
                        </div>
                        <div class="form-group mt-2 col-md-4">
                            <label for="branch" class="label-spe">Şube</label>
                            <input type="text" class="form-control" name="branch" id="branch" value="{!! $account->branch ?? '' !!}"/>
                        </div>
                        </div>
                        <div class="form-group mt-2 col-md-4">
                            <label for="accNo" class="label-spe">Hesap No</label>
                            <input type="text" class="form-control" name="accountNo" id="accountNo" value="{!! $account->accountNo ?? '' !!}"/>
                        </div>
                        <div class="form-group mt-2 d-none">
                            <label for="iban" class="label-spe">IBAN</label>
                            <input type="text" class="form-control" name="iban" id="iban" value="{!! $account->iban ?? '' !!}"/>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description" class="label-spe">Açıklama</label>
                            <input type="text" class="form-control" name="description" id="description" value="{!! $account->description ?? '' !!}"/>
                        </div>
                    
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('accounts.index') }}" class="btn btn-light">Cancel</a>
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
    $("#oDate").datepicker({
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
$('#oDate').val(getCurrentDate());

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
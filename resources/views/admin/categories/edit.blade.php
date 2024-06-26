@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span style="font-weight: bold">Add Category</span>
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

                    @if(!empty($category->id))
                        @php
                            $routeLink = route('category.update',$category->id);
                        @endphp
                    @else
                        @php
                            $routeLink = route('category.store');
                        @endphp
                    @endif
                    <form action="{{ $routeLink }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @if(!empty($category->id))
                            @method('PUT')
                        @endif
                        <div class="form-group mt-2">
                            <label for="name" class="label-spe">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $category->name ?? '' }}" placeholder="Name" onblur="path();">
                        </div>

                        <div class="form-group mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="subCategory">
                                <label class="form-check-label label-spe" for="subCategory">
                                    Is it Sub Category ?
                                </label>
                            </div>
                        </div>

                        <div class="category-select mt-2">
                            <div class="form-group">
                                <label for="parent" class="label-spe">Category</label>
                                <select class="js-example-basic-multiple form-control" name="parent[]" id="parent"
                                        multiple="multiple">
                                    <option value="">Select an option...</option>

                                    @foreach($categories as $id => $name)
                                        <option value="{{$name->id}}">{{$name->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="slug" class="label-spe">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="{{ $category->slug ?? '' }}" placeholder="Slug">
                        </div>

                        <div class="form-group mt-2">
                            <label for="status" class="label-spe">Status</label>
                            @php
                                $status = $category->status ?? '';
                            @endphp
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Passive</option>

                            </select>
                        </div>
                        <div
                            class="card-footer px-0 py-3 mt-3 bg-transparent border-0 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('category.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
            $('#parent').parents('.category-select').addClass('d-none');
            $(document).on('change', '#subCategory', function () {
                var subCategoryIsChecked = $(this).is(':checked');
                if (subCategoryIsChecked) {
                    $('#parent').parents('.category-select').removeClass('d-none');
                } else {
                    $('#parent').parents('.category-select').addClass('d-none');
                }
            });
        });
    </script>
@endsection
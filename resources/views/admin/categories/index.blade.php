@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Category</h4>
                    <span class="card-description">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($categories) && $categories->count() > 0)
                                @foreach($categories as $cat)
                                    <tr class="item">
                                        <td>{{ $cat->id }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->parent }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    {{ $cat->status == '1' ? 'Active' : 'Passive' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('category.edit', $cat->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('category.destroy', $cat->id) }}" method="POST">
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
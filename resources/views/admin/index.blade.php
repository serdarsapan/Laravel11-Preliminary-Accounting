@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog</h4>
                    <p class="card-description">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Table</a>
                    </p>

                    @if(session()->get('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($blogs) && $blogs->count() > 0)
                                @foreach($blogs as $blog)
                                    <tr class="item">
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->content }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="case" data-on="In Progress"
                                                           data-off="Pending" data-onstyle="success"
                                                           data-offstyle="danger"
                                                           {{ $blog->status == '1' ? 'checked' : '' }} data-toggle="toggle">
                                                </label>
                                            </div>
                                        </td>
                                        <td><a href="" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-danger">Delete</button>
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
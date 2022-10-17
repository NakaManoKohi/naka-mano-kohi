@extends('dashboard.templates.main')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <a href="/dashboard/blog/create" class="btn btn-primary">Create New Post</a>
    <div class="mt-3">
        <div class="table-responsive col-8">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>
                        <a href="/dashboard/blog/{{ $blog->slug }}" class="btn btn-info"><i class="fa-solid fa-circle-info"></i> Detail</a>
                        <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="/dashboard/blog/{{ $blog->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
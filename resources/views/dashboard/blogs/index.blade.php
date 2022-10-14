@extends('dashboard.templates.main')

@section('content')
    <a href="#" class="btn btn-primary">Create New Post</a>
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
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
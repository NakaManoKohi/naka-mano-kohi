@extends('dashboard.templates.main')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <a href="/dashboard/post/create" class="btn btn-primary">Create New Post</a>
    <div class="mt-3">
        <div class="table-responsive col-10">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Caption</th>
                    <th>Author</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! $post->caption !!}</td>
                        <td>{{ $post->user->username }}</td>
                        <td>
                        <a href="/dashboard/post/{{ $post->id }}" class="btn btn-info"><i class="fa-solid fa-circle-info"></i> Detail</a>
                        <a href="/dashboard/post/{{ $post->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $post->id }}" id="deletePost"><i class="fa-solid fa-trash"></i> Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You sure?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="post" class="d-inline" name="deletePost">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
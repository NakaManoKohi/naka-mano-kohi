@extends('dashboard.templates.main')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

    @if(session()->has('suspended'))
    <div class="alert alert-warning alert-dismissible fade show col-8" role="alert">
        {{ session('suspended') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <a href="/dashboard/user/create" class="btn btn-primary">Create New User</a>
    <div class="mt-3">
        <div class="table-responsive col-8">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                        <a href="/dashboard/user/{{ $user->username }}" class="btn btn-info"><i class="fa-solid fa-circle-info"></i> Detail</a>
                        <form action="/dashboard/user/{{ $user->username }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                        @if($user->suspend == 1)
                            <a href="/dashboard/user/{{ $user->username }}/activate" class="btn btn-success" onclick="return confirm('Are You sure?')">Activate</a>
                        @else
                            <a href="/dashboard/user/{{ $user->username }}/suspend" class="btn btn-secondary" onclick="return confirm('Are You Sure?')">Suspend</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
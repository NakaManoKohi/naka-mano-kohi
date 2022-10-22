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
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#suspendModal" id="activateUser" data-id="{{ $user->username }}">Activate</button>
                        @else
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#suspendModal" data-id="{{ $user->username }}" id="suspendUser">Suspend</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="suspendModal" tabindex="-1" aria-labelledby="suspendModalLabel" aria-hidden="true">
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
          <a class="text-decoration-none text-white btn btn-primary" id="confirm">Yes</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
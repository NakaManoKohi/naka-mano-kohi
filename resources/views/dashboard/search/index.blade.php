@extends('dashboard.templates.main')

@section('content')
    <div class="mt-3 col-10">
        @if($blogs->count() == 0 && $events->count() == 0 && $users->count() == 0)
            <h1>HASIL NYA TIDAK ADA</h1>
        @else
        <section>
            @if($blogs->count())
            <h3>Blogs</h3>
                    <table class="table">
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
                                        <a href="/dashboard/blog/{{ $blog->slug }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
                @else

                @endif
            </section>
            <section>
                @if($events->count())
                    <h3>Events</h3>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->date }}</td>
                                <td>
                                    <a href="/dashboard/event/{{ $event->slug }}" class="btn btn-info"><i class="fa-solid fa-circle-info"></i> Detail</a>
                                    <a href="/dashboard/event/{{ $event->slug }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form action="/dashboard/event/{{ $event->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
            
                @endif
            </section>
            <section>
                @if($users->count())
                    <h3>Users</h3>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
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
                @else

                @endif
            </section>
        @endif

    </div>
@endsection
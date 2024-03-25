<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <x-app-layout>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mt-5 mb-3">
            <h2>Users</h2>
            <a class="btn btn-primary btn-sm" href="/admin/create">
                <i class="fas fa-user-plus"></i> Add new user
            </a>
        </div>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th class="col-3">Name</th>
                <th class="col-4">Email</th>
                <th class="col-1">Admin</th>
                <th class="col-1">Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin == '1' ? 'Yes' : 'No' }}</td>
                <td class="d-flex gap-1">
                    <a class="btn btn-warning btn-sm" href="/admin/{{ $user->id }}/edit">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    <form action="/admin/{{ $user->id }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <h2 class="mt-5 mb-3">Reservations</h2>

        <table class="table table-hover">
            <tr>
                <th>Book</th>
                <th class="col-3">User</th>
                <th class="col-4">Email</th>
                <th class="col-1">Status</th>
                <th class="col-1">Action</th>
            </tr>
            @if (count($reservations) > 0)
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->book->title }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->user->email }}</td>
                <td>{{ $reservation->status }}</td>
                <td class="d-flex gap-1">
                    <a class="btn btn-success btn-sm" href="{{ route('admin.confirmReservation', $reservation->id) }}">
                        <i class="far fa-check-circle"></i>
                    </a>
                    <form action="{{ route('admin.rejectReservation', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="far fa-times-circle"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @elseif (count($reservations) == 0)
            <tr>
                <td colspan="5">No reservations found</td>
            </tr>
            @endif
        </table>
    </div>
</x-app-layout>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
@extends('layouts.main')
@section('content')

<div class="container my-5 pt-5">
    <h1>Welcome {{ Auth::user()->first_name }}</h1>
    <div class="container py-5">
        <div class="row">
        <h3>Email Address: </h3>
        </div>
        <div class="row">
            <div class="col-6">
                {{ Auth::user()->email}}
            </div>
            <div class="col-1">
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-success" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal2">Edit</button>
            </div>
        </div>
    
    </div>
    <!-- Modal HTML (hidden by default) -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Email Address</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('update_email') }}" method="POST">
                    @csrf

                    <input type="hidden" name="user_id"  value="{{ Auth::user()->id }}">

                    <div class="mb-3">
                        <label for="email" class="form-label">Enter new email: </label>
                        <input type="email" id ="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
    
    <h3>My Reservations</h3>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">Room Number</th>
        <th scope="col">Chech-in</th>
        <th scope="col">Check-out</th>
        <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    @if($userReservations->isEmpty())
    <tbody class="table-group-divider table-divider-color">
        <tr><td colspan="4"><?php echo "You have no reservations yet.";?></td></tr>
    @else

    @foreach($userReservations as $reservation)
    <tbody class="table-group-divider table-divider-color">
        <tr>
        <th scope="row">{{ $reservation->room_number }}</th>
        <td>{{ $reservation->check_in_date }}</td>
        <td>{{ $reservation->check_out_date }}</td>
        <td><a href="#" class="edit-icon px-1"><i class="fas fa-edit fa-lg"></i></a>|<a href="#" class="delete-icon px-1"><i class="fas fa-trash-alt fa-lg"></i></a></td>
        </tr>
    </tbody>
    @endforeach
    @endif
    </table>
    
</div>
@endsection
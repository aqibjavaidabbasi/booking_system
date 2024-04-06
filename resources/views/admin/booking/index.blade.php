@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Booking</h5>
                </div>
                <div class="card-body">
                    <table id="alternative-pagination"
                        class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>User_id</th>
                                <th>Meeting_Room_iD</th>,
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($bookings))
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->User->name }}</td>
                                        <td>{{ $booking->meeting_room_id }}</td>
                                        <td>{{ $booking->start_time }}</td>
                                        <td>{{ $booking->end_time }}</td>

                                        {{-- - --}}
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">

                                                    {{-- <li><a href=""class="dropdown-item edit-item-btn"
                                                            title="change status">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a></li>
                                                    <li> --}}
                                                    <a href="" class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                        Delete
                                                    </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        {{--  --}}
                                    </tr>
                                @endforeach
                            @else
                                <p class="text-center text-bg-danger">No recoerd found</p>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

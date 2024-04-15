@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">All Meeting Rooms</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('meetingrooms.create') }}" class="btn btn-outline-primary">Add Meeting Room</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alternative-pagination"
                        class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Room Name</th>
                                <th>Description</th>
                                <th>Access Code</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Notification Emails</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($rooms))
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->description }}</td>
                                        <td>{{ $room->access_code }}</td>
                                        <td>{{ $room->date }}</td>
                                        <td>{{ $room->start_time }}</td>
                                        <td>{{ $room->end_time }}</td>
                                        <td>
                                            @foreach ($room->AddNotificationEmail as $notifyemail)
                                                @foreach (explode(',', $notifyemail->email) as $email)
                                                    {{ trim($email) }}<br>
                                                @endforeach
                                            @endforeach

                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>

                                                        <button type="button" class="dropdown-item remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#signupModals{{ $room->id }}"><i
                                                                class="ri-folder-download-line"></i>
                                                            Add Emails</button>
                                                    </li>
                                                    <li><a href="{{ route('meetingrooms.edit', $room->id) }}"class="dropdown-item edit-item-btn"
                                                            title="change status">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a></li>
                                                    <li>

                                                        <button type="button" class="dropdown-item remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#fadeInleftModal{{ $room->id }}"><i
                                                                class="ri-delete-bin-5-line"></i>
                                                            Delete</button>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                        {{--  --}}
                                    </tr>
                                    <div id="fadeInleftModal{{ $room->id }}" class="modal fade fadeInLeft"
                                        tabindex="-1" aria-labelledby="fadeInleftModalLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('meetingrooms.delete', $room->id) }}">
                                                    @method('GET')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fadeInleftModalLabel">Are you sure want
                                                            to
                                                            delete this data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="text-muted">this data will be deleted permanently.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary ">Delete</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    {{-- add emails --}}
                                    <div id="signupModals{{ $room->id }}" class="modal fade" tabindex="-1"
                                        aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">

                                            <div class="modal-content border-0 overflow-hidden">
                                                <div class="modal-header p-3">
                                                    <h4 class="card-title mb-0">Add Emails</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                {{-- <div class="alert alert-success  rounded-0 mb-0">
                                                    <p class="mb-0">Enter Emails comma separated</p>
                                                </div> --}}
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('meetingrooms.notification_emails', $room->id) }}"
                                                        method="post">
                                                        @method('POST')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Enter Emails (comma
                                                                separated)</label>
                                                            <textarea type="text" name="email" class="form-control" id="email" placeholder="Enter your name"
                                                                value="">
@foreach ($room->AddNotificationEmail as $key => $notifyemail)
{{ implode(',', array_map('trim', explode(',', $notifyemail->email))) }}@if (!$loop->last)
,
@endif
@endforeach
</textarea>
                                                        </div>


                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
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
    <script></script>
@endsection

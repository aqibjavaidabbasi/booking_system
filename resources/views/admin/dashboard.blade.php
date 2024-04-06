@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Meeting Rooms</h5>
                </div>
                <div class="card-body">
                    <table id="alternative-pagination"
                        class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Token</th>
                                <th>status</th>
                                <th>Start date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($users))
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->auth_code }}</td>
                                        <td>

                                            @if ($user->status == false)
                                                <span class="badge badge-soft-danger p-2">panding</span>
                                            @else
                                                <span class="badge badge-soft-success p-2">approved</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                        {{-- - --}}
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if ($user->status == false)
                                                        <li>
                                                            <a href="{{ route('user-booking-status', ['id' => $user->id, 'slug' => 'approve']) }}"class="dropdown-item edit-item-btn"
                                                                title="change status">
                                                                <i class="ri-check-line"></i>
                                                                Approve
                                                            </a>
                                                        </li>
                                                        <li>
                                                        <li>
                                                            <a href="{{ route('user-booking-status', ['id' => $user->id, 'slug' => 'reject']) }}"class="dropdown-item edit-item-btn"
                                                                title="change status">
                                                                <i class="ri-close-line"></i>
                                                                Reject
                                                            </a>
                                                        </li>
                                                    @else
                                                        <a href="{{ route('user-booking-status', ['id' => $user->id, 'slug' => 'approve']) }}"class="dropdown-item edit-item-btn"
                                                            title="change status">
                                                            <i class="ri-check-line"></i>
                                                            Approve
                                                        </a>
                                                    @endif
                                                    <li>

                                                        <button type="button" class="dropdown-item remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#fadeInleftModal{{ $user->id }}"><i
                                                                class="ri-delete-bin-5-line"></i>
                                                            Delete</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        {{--  --}}
                                    </tr>
                                    <div id="fadeInleftModal{{ $user->id }}" class="modal fade fadeInLeft"
                                        tabindex="-1" aria-labelledby="fadeInleftModalLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('user-destroy', $user->id) }}">
                                                    @method('GET')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fadeInleftModalLabel">Are you sure
                                                            want
                                                            to
                                                            delete this data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="text-muted">this data will be
                                                            deleted
                                                            permanently.</p>
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

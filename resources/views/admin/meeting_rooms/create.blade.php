@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Meeting Room</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            {{-- <label for="FormSelectDefault" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="FormSelectDefault"> --}}
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('meetingrooms.store') }}" method="post">
                            @method('POST')
                            @csrf
                            <div class="row">

                                <div class="col-lg-6">
                                    <label class="form-label">Room Nam</label>
                                    <input class="form-control mb-3" type="text" name="name" value=""
                                        placeholder="Room name" placeholder="Room Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Meeting code</label>
                                    <input class="form-control mb-3"
                                        type="text"style="appearance: none; -moz-appearance: textfield;"
                                        onkeyup="validateCodeLength(this)" placeholder="code (optional)" required
                                        maxlength="6" value="" placeholder="Room code">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Select Date</label>
                                    <input class="form-control mb-3" type="date" value="" name="date" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Start Time</label>
                                    <input class="form-control mb-3" type="time" value="" name="start_time"
                                        required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">End Time</label>
                                    <input class="form-control mb-3" type="time" value="" name="end_time" required>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Description</label>
                                    <textarea type="text" class="form-control" value="" name="description" placeholder="description"></textarea>
                                </div>

                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary px-3">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <script>
        $(document).ready(function() {
            function validateCodeLength(input) {
                if (input.value.length > 8) {
                    input.value = input.value.slice(0, 8); // Limit input to 6 characters
                }
            }


        });
    </script>
@endsection

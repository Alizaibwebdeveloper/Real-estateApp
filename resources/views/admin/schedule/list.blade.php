@extends('agent.agent_dashboard')
<!-- partial -->

@section('agent')
    <div class="page-content">
        @include('_message')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Schedule</a></li>
                <li class="breadcrumb-item active" aria-current="page">Schedule List</li>
            </ol>


            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-12 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Schedule List</h4>
                                            {{-- <div class="d-flex align-item-center" style="float: right;">
                                                <a href="{{ url('admin/week/add') }}" class="btn btn-primary">Add
                                                    Schedule</a>
                                            </div> --}}
                                        </div>
                                        <div class="table-responsive pt-3">
                                            <form action="{{ url('admin/schedule/add') }}" method="post">
                                                @csrf
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Week</th>
                                                            <th>Open/Close</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($weeks as $value)
                                                            @php
                                                                $getuserweek = App\Models\UserTimeModel::getDetail(
                                                                    $value->id,
                                                                );
                                                                $open_close = !empty($getuserweek->status)
                                                                    ? $getuserweek->status
                                                                    : '';
                                                                $start_time = !empty($getuserweek->start_time)
                                                                    ? $getuserweek->start_time
                                                                    : '';
                                                                $end_time = !empty($getuserweek->end_time)
                                                                    ? $getuserweek->end_time
                                                                    : '';
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $value->name ?? '' }}</td>
                                                                <td>
                                                                    <input type="hidden"
                                                                        name="week[{{ $value->id }}][week_id]"
                                                                        value="{{ $value->id }}">
                                                                    <input type="hidden"
                                                                        name="week[{{ $value->id }}][status]"
                                                                        value="0">
                                                                    <label class="switch">
                                                                        <input class="change-availability" type="checkbox"
                                                                            name="week[{{ $value->id }}][status]"
                                                                            value="1"
                                                                            {{ !empty($open_close) && $open_close == 1 ? 'checked' : '' }}>
                                                                    </label>
                                                                </td>

                                                                <td>
                                                                    <select name="week[{{ $value->id }}][start_time]"
                                                                        class="form-control required-{{ $value->id }} show-availability-{{ $value->id }}">
                                                                        <option value="">Select Start Time</option>
                                                                        @foreach ($weekTimes as $time)
                                                                            <option value="{{ $time->name }}"
                                                                                {{ trim($start_time->start_time ?? '') === trim($time->name) ? 'selected' : '' }}>
                                                                                {{ $time->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="week[{{ $value->id }}][end_time]"
                                                                        class="form-control required-{{ $value->id }} show-availability-{{ $value->id }}">
                                                                        <option value="">Select End Time</option>
                                                                        @foreach ($weekTimes as $time)
                                                                            <option value="{{ $time->name }}"
                                                                                {{ trim($end_time->end_time ?? '') === trim($time->name) ? 'selected' : '' }}>
                                                                                {{ $time->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <br>
                                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
                @section('script')
                    <script>
                        $(document).on('click', '.change-availability', function() {
                            var id = $(this).attr('id'); // Get data-id instead of id

                            if ($(this).prop('checked')) {
                                $('.show-availability-' + id).show();
                                $('.required-' + id).prop('required', true);
                            } else {
                                $('.show-availability-' + id).hide();
                                $('.required-' + id).prop('required', false);
                            }
                        });
                    </script>
                @endsection

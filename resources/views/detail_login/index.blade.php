@extends('template.index')

@section('content')
        <h1 class="mb-4">User Login Logs</h1>
        
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Login Activity</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Login Time</th>
                            <th>IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($login_log->count())
                            @foreach ($login_log as $index => $log)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $log->user->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($log->login_time)->translatedFormat('l, d F Y') }}</td> 
                                    <td>{{ $log->ip_address }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No login logs found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    </div>
@endsection

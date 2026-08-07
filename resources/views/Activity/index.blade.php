@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Activity Logs') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Table Title -->
                    <h2 class="mt-4">{{ __('Activity Logs') }}</h2>

                    <!-- Bootstrap Table -->
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('VISIT ID') }}</th>
                                    <th>{{ __('IP') }}</th>
                                    <th>{{ __('HOST') }}</th>
                                    <th>{{ __('DEVICE') }}</th>
                                    <th>{{ __('BROWSER') }}</th>
                                    <th>{{ __('BROWSER VERSION') }}</th>
                                    <th>{{ __('OS') }}</th>
                                    <th>{{ __('OS VERSION') }}</th>
                                    <th>{{ __('Created') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activities as $key => $act)
                                    <tr>
                                        <td>{{ $activities->firstItem() + $key }}</td>
                                        <td>{{ $act->visitor_id }}</td>
                                        <td>{{ $act->ip_address }}</td>
                                        <td>{{ $act->hostname }}</td>
                                        <td>{{ $act->device_type }}</td>                                
                                        <td>{{ $act->browser }}</td>   
                                        <td>{{ $act->browser_version }}</td>   
                                        <td>{{ $act->os }}</td>   
                                        <td>{{ $act->os_version }}</td>   
                                        <td>{{ \Carbon\Carbon::parse($act->created_at)->format('d M Y \a\t h:i A') }}</td>
  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Enhanced Pagination Links -->
                    <div class="mt-4">
                        {{ $activities->links('vendor.pagination.simple-bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

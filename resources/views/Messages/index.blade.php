@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Messages') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Table Title -->
                    <h2 class="mt-4">{{ __('Message List') }}</h2>

                    <!-- Bootstrap Table -->
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Message') }}</th>
                                    <th>{{ __('IP') }}</th>
                                    <th>{{ __('Host') }}</th>
                                    <th>{{ __('Created') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ $contacts->firstItem() + $key }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>{{ $contact->ip_address }}</td>                                
                                        <td>{{ $contact->hostname }}</td>   
                                        <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y \a\t h:i A') }}</td>
  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $contacts->links('vendor.pagination.simple-bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

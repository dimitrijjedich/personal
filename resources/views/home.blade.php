@extends('layouts.master')
@section('content')
    <div class="row">
        @foreach( $users as $user )
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->email  }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

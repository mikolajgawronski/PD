@extends('layouts.app')
@extends("master")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil użytkownika') }} {{  Auth::user()->username }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @include("profile.rentals")
                        <br>
                        @include("profile.tournaments")
                        <br>
                        @include("profile.rooms")

                        @if(\Illuminate\Support\Facades\Auth::user()->admin == 1)
                            <br>
                            @include("profile.admin")
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

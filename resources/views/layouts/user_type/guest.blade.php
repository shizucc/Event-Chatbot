@extends('layouts.app')

@section('guest')
    @if(\Request::is('login/forgot-password')) 
        @include('layouts.navbars.guest.nav')
        {{ $slot }}
    @else
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.navbars.guest.nav')
                </div>
            </div>
        </div>
        {{ $slot }}        
        @include('layouts.footers.guest.footer')
    @endif
@endsection
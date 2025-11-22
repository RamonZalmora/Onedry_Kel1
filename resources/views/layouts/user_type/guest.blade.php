@extends('layouts.app')

@section('guest')

    {{-- Kalau bukan halaman login, tampilkan navbar --}}
    @if ( !Request::is('login') && !Request::is('register') )
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.navbars.guest.nav')
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    @if ( !Request::is('login') && !Request::is('register') )
        @include('layouts.footers.guest.footer')
    @endif

@endsection

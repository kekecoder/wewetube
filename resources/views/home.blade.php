@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                <div class="card-body">
                    @if (session('status') == "two-factor-auntentication-disabled")
                        <div class="alert alert-danger" role="alert">
                            Two Factor authentication has been disabled
                        </div>
                    @endif

                    <div class="card-body">
                        @if (session('status') == "two-factor-auntentication-enabled")
                            <div class="alert alert-success" role="alert">
                                Two Factor authentication has been enabled
                            </div>
                        @endif

                    <form action="{{ url('/user/two-factor-authentication') }}" method="post">
                        @csrf
                        @if (auth()->user()->two_factor_secret)
                        @method('DELETE')

                        <div>
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>


                        <button class="btn btn-danger mt-4">Disable</button>
                        @else
                            <button class="btn btn-primary">Enable</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

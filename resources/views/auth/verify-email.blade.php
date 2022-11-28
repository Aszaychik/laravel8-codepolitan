@extends('layouts.app')

@section('main')
<div class="mt-5 mx-auto" style="width: 380px">
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    Verification link has been sent to your email
                </div>
            @endif

            <p>Before proceeding, please check your email for verification</p>

            <form class="d-inline" action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                {{ __('click here to request another verification email') }}
            </button>
            .
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail User</h2>
                    <a class="btn-back" href="{{ route('user.index') }}">
                        <img class ="" src="{{ asset('img/back.png') }}" alt="Back Button">
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-group">
                <strong>ID User:</strong>
                {{ $user->id }}
            </div>
        </div>
        <div class="mt-3">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $user->username }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Account Number:</strong>
                {{ $user->account_number }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $user->phone }}
            </div>
        </div>
    </div>
@endsection
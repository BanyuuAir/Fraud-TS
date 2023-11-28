@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Data User</h2>
                    <a class="btn-back" href="{{ route('user.index') }}">
                        <img class ="" src="{{ asset('img/back.png') }}" alt="Back Button">
                    </a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">ID User:</label>
                        <input type="text" name="id" value="{{ $user->id }}" class="form-control" id="id" placeholder="id">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control" id="username" placeholder="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_number">Account Number:</label>
                        <input type="text" name="account_number" value="{{ $user->account_number }}" class="form-control" id="account_number" placeholder="account_number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" placeholder="phone">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn-back" style="cursor: pointer; background: none; border: none;">
                        <img class ="" src="{{ asset('img/Update.png') }}" alt="Update Button">
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
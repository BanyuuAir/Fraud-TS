@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Data Transaction</h2>
                    <a class="btn btn-primary" href="{{ route('transaction.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_user">User ID:</label>
                        <input type="text" name="id_user" value="{{ $transaction->id_user }}" class="form-control" id="id_user" placeholder="id_user">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="time">Waktu:</label>
                        <input type="datetime-local" name="time" value="{{ $transaction->time }}" class="form-control" id="time" placeholder="time">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_number">Account Number:</label>
                        <input type="text" name="account_number" value="{{ $transaction->account_number }}" class="form-control" id="account_number" placeholder="account_number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" name="amount" value="{{ $transaction->amount }}" class="form-control" id="amount" placeholder="amount">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_destination">Account Destination:</label>
                        <input type="text" name="account_destination" value="{{ $transaction->account_destination }}" class="form-control" id="account_destination" placeholder="account_destination">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel">Channel:</label>
                        <input type="text" name="channel" value="{{ $transaction->channel }}" class="form-control" id="channel" placeholder="channel">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
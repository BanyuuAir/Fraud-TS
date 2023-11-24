@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Transaction</h2>
                    <a class="btn btn-primary" href="{{ route('transaction.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="form-group">
                <strong>User ID:</strong>
                {{ $transaction->id_user }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Waktu:</strong>
                {{ $transaction->time }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Account Number:</strong>
                {{ $transaction->account_number }}
            </div>
        </div>
        <div class="mt-3">
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $transaction->amount }}
            </div>
        </div>
        <div class="mt-3">
            <div class="form-group">
                <strong>Account Destination:</strong>
                {{ $transaction->account_destination }}
            </div>
        </div>
        <div class="mt-3">
            <div class="form-group">
                <strong>Channel:</strong>
                {{ $transaction->channel }}
            </div>
        </div>
    </div>
@endsection
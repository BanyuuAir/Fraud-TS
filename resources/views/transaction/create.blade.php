@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tambah Data Transaction</h2>
                    <a class="btn btn-primary" href="{{ route('transaction.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_user">User ID:</label>
                        <input type="text" name="id_user" class="form-control" id="id_user" placeholder="id_user">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="time">Waktu:</label>
                        <input type="datetime-local" name="time" class="form-control" id="time" placeholder="time">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_number">Account Number:</label>
                        <input type="text" name="account_number" class="form-control" id="account_number" placeholder="account_number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="amount">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_destination">Account Destination:</label>
                        <input type="text" name="account_destination" class="form-control" id="account_destination" placeholder="account_destination">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel">Channel:</label>
                        <input type="text" name="channel" class="form-control" id="channel" placeholder="channel">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <br>
        <!-- Form for uploading CSV file -->
        <form action="{{ route('transaction.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                <div class="form-group">
                        <label for="csv_file">Upload File CSV:</label>
                        <input type="file" name="csv_file" class="form-control-file" id="csv_file" accept=".csv">
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload CSV</button>
                    </div>
            </div>
            </div>
            </div>
        </form>
    </div>
@endsection
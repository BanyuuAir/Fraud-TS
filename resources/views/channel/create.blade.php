@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h2-font">
                       <i> <h2>Add Channel Data</h2></i>
                    </div>
                    <a class="btn-back" href="{{ route('channel.index') }}">
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
        <form action="{{ route('channel.store') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel_code">Channel Code:</label>
                        <input type="text" name="channel_code" class="form-control" id="channel_code" placeholder="channel_code">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel_code">Channel Type:</label>
                        <input type="text" name="channel_type" class="form-control" id="channel_type" placeholder="channel_type">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel_desc">Channel Description:</label>
                        <input type="text" name="channel_desc" class="form-control" id="channel_desc" placeholder="channel_desc">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn-back" style="cursor: pointer; background: none; border: none;">
                        <img class ="" src="{{ asset('img/submit.png') }}" alt="Submit Button">
                    </button>
                </div>
            </div>
        </form>
        <br>
        <!-- Form for uploading CSV file -->
        <form action="{{ route('channel.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                <div class="form-group">
                    <div class="h2-font">
                       <i> <h2><label for="csv_file">Upload CSV File:</label></h2></i>
                    </div>
                        <input type="file" name="csv_file" class="form-control-file" id="csv_file" accept=".csv">
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-group">
                        <button type="submit" class="btn-back" style="cursor: pointer; background: none; border: none;">
                            <img class ="" src="{{ asset('img/upload.png') }}" alt="upload Button">
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
@endsection
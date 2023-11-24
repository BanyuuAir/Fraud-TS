@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tambah Data Type Aktivitas</h2>
                    <a class="btn btn-primary" href="{{ route('activityType.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('activityType.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="activity_type">Activity Type:</label>
                        <input type="text" name="activity_type" class="form-control" id="activity_type" placeholder="activity_type">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="activity_desc">Activity Description:</label>
                        <input type="text" name="activity_desc" class="form-control" id="activity_desc" placeholder="activity_desc">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <br>
        <!-- Form for uploading CSV file -->
        <form action="{{ route('activityType.import') }}" method="POST" enctype="multipart/form-data">
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
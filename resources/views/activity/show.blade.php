@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h2-font">
                       <i> <h2>Detail Activity Data</h2></i>
                    </div>
                    <a class="btn-back" href="{{ route('activity.index') }}">
                        <img class ="" src="{{ asset('img/back.png') }}" alt="Back Button">
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="form-group">
                <strong>User ID:</strong>
                {{ $activity->id_user }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Time:</strong>
                {{ $activity->time }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Activity:</strong>
                {{ $activity->activity }}
            </div>
        </div>
    </div>
@endsection
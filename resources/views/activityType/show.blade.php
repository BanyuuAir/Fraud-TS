@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Type Aktivitas</h2>
                    <a class="btn-back" href="{{ route('activityType.index') }}">
                        <img class ="" src="{{ asset('img/back.png') }}" alt="Back Button">
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="form-group">
                <strong>Type Activity ID:</strong>
                {{ $activityType->id }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Activity Type:</strong>
                {{ $activityType->activity_type }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Activity Description:</strong>
                {{ $activityType->activity_desc }}
            </div>
        </div>
    </div>
@endsection
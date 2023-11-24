@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Type Channel</h2>
                    <a class="btn btn-primary" href="{{ route('channel.index') }}">Back</a>
                </div>
            </div>
        </div>

        
        <div class="mt-3">
            <div class="form-group">
                <strong>Channel Code:</strong>
                {{ $channel->channel_code }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Channel Type:</strong>
                {{ $channel->channel_type }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Channel Description:</strong>
                {{ $channel->channel_desc }}
            </div>
        </div>
    </div>
@endsection
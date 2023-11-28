@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Data Type Channel</h2>
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
        <form action="{{ route('channel.update', $channel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel_code">Channel Code:</label>
                        <input type="text" name="channel_code" value="{{ $channel->channel_code }}" class="form-control" id="channel_code" placeholder="channel_code">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel_type">Channel Type:</label>
                        <input type="text" name="channel_type" value="{{ $channel->channel_type }}" class="form-control" id="channel_type" placeholder="channel_type">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="channel_desc">Channel Description:</label>
                        <input type="text" name="channel_desc" value="{{ $channel->channel_desc }}" class="form-control" id="channel_desc" placeholder="channel">
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
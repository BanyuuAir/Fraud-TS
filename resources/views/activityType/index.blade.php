@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Activity Type</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('activityType.create') }}"> Masukan Data Type Aktivitas</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Activity ID</th>
                    <th>Activity Type</th>
                    <th>Activity Descripton</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
                <?php $idx = 1; ?>
                @foreach ($activityType as $data)
                    <tr>
                        <td>{{ $idx }}</td>
                        <td>{{ $data->id}}</td>
                        <td>{{ $data->activity_type }}</td>
                        <td>{{ $data->activity_desc }}</td>
                        <td>
                            <form action="{{ route('activityType.destroy', $data->id) }}" method="Post">
                                <a class="btn btn-info" href="{{ route('activityType.show', $data->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('activityType.edit', $data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $idx++; ?>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-warning" href="{{ route('welcome') }}">Home</a>
                </div>
            </div>
        </div>
@endsection
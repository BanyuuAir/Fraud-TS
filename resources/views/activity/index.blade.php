@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <!-- Add Button Section -->
        <div class="add-btn">
            <a class="add-link" href="{{ route('activity.create') }}">
                <img class="" src="{{ asset('img/add_data.png') }}" alt="Add Button">
            </a>
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
                    <th>User ID</th>
                    <th>waktu</th>
                    <th>Aktivitas</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
                <?php $idx = 1; ?>
                @foreach ($activity as $data)
                    <tr>
                        <td>{{ $idx }}</td>
                        <td>{{ $data->id_user}}</td>
                        <td>{{ $data->time }}</td>
                        <td>{{ $data->activity }}</td>
                        <td>
                            <form action="{{ route('activity.destroy', $data->id) }}" method="Post">
                                <a class="btn btn-info" href="{{ route('activity.show', $data->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('activity.edit', $data->id) }}">Edit</a>
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
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                    <div class="flex justify-start">
                        <a href="{{ $activity->previousPageUrl() }}" class="btn-pagination" aria-label="Previous"><</a>
                        @foreach(range(1, $activity->lastPage()) as $i)
                            <a href="{{ $activity->url($i) }}" class="btn-pagination {{ $activity->currentPage() == $i ? 'active' : '' }}" aria-label="Go to page {{ $i }}">{{ $i }}</a>
                        @endforeach
                        <a href="{{ $activity->nextPageUrl() }}" class="btn-pagination" aria-label="Next">></a>
                    </div>
                </nav>
            </div>
        </div>
        <br>
    <!-- Sub Button Section -->
    <div class="sub-btn">
        <a class="sub-link" href="{{ route('user.index') }}">
            <img class ="" src="{{ asset('img/previous.png') }}" alt="Previous Button">
        </a>
        <a class="sub-link" href="{{ route('welcome') }}">
            <img class ="" src="{{ asset('img/home.png') }}" alt="Home Button">
        </a>
        <a class="sub-link" href="{{ route('transaction.index') }}">
            <img class ="" src="{{ asset('img/next.png') }}" alt="Next Button">
        </a>
    </div>
@endsection
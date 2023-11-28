@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">USER DATA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('activity.index') }}">ACTIVITY DATA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transaction.index') }}">TRANSACTION DATA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('channel.index') }}">TRANSACTION CHANNEL DATA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('activityType.index') }}">ACTIVITY TYPE DATA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('form') }}">SUMMARY</a>
            </li>
        </ul>
    </div>
</nav>

<img class="header" src="img/act_cd.png" alt="Logo Halaman">

<div class="container mt-2">
        <!-- Add Button Section -->
        <div class="add-btn">
            <a class="add-link" href="{{ route('activityType.create') }}">
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
                    <!-- <th>No</th> -->
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
                        <!-- <td>{{ $idx }}</td> -->
                        <td>{{ $data->id}}</td>
                        <td>{{ $data->activity_type }}</td>
                        <td>{{ $data->activity_desc }}</td>
                        <td>
                        <div class="small-btn">
                                <form action="{{ route('activityType.destroy', $data->id) }}" method="POST">
                                    <!-- Show Button -->
                                    <a class="small-link" href="{{ route('activityType.show', $data->id) }}">
                                        <img src="{{ asset('img/show.png') }}" alt="Show Button" title="Show">
                                    </a>

                                    <!-- Edit Button -->
                                    <a class="small-link" href="{{ route('activityType.edit', $data->id) }}">
                                        <img src="{{ asset('img/edit.png') }}" alt="Edit Button" title="Edit">
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <!-- Delete Button -->
                                    <button class="small-link" type="submit" style="cursor: pointer; background: none; border: none;">
                                        <img src="{{ asset('img/delete.png') }}" alt="Delete Button" title="Delete">
                                    </button>
                                </form>
                            </div>
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
                        <a href="{{ $activityType->previousPageUrl() }}" class="btn-pagination" aria-label="Previous"><</a>
                        @foreach(range(1, $activityType->lastPage()) as $i)
                            <a href="{{ $activityType->url($i) }}" class="btn-pagination {{ $activityType->currentPage() == $i ? 'active' : '' }}" aria-label="Go to page {{ $i }}">{{ $i }}</a>
                        @endforeach
                        <a href="{{ $activityType->nextPageUrl() }}" class="btn-pagination" aria-label="Next">></a>
                    </div>
                </nav>
            </div>
        </div>
        <br>

    <!-- Sub Button Section -->
    <div class="sub-btn">
        <!-- <a class="sub-link" href="{{ route('welcome') }}">
            <img class ="" src="{{ asset('img/previous.png') }}" alt="Previous Button">
        </a> -->
        <a class="sub-link" href="{{ route('welcome') }}">
            <img class ="" src="{{ asset('img/home.png') }}" alt="Home Button">
        </a>
        <!-- <a class="sub-link" href="{{ route('activity.index') }}">
            <img class ="" src="{{ asset('img/next.png') }}" alt="Next Button">
        </a> -->
    </div>
</div>
@endsection
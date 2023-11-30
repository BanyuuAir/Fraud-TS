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

<img class="header" src="{{ asset('img/act_cd.png') }}" alt="Logo Halaman">

<div class="container mt-2">
    <div class="container mt-2 text-center">
        <!-- Add Button Section -->
        <div class="add-btn">
            <a class="add-link" href="{{ route('activityType.create') }}">
                <img class="" src="{{ asset('img/add_data.png') }}" alt="Add Button">
            </a>
        </div>
        <!-- Rest of the code remains unchanged -->
        <!-- ... -->
    </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-container">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr style="background-color: black; color: white;">
                    <!-- <th>No</th> -->
                    <th>ACTIVITY ID</th>
                    <th>ACTIVITY TYPE</th>
                    <th>ACTIVITY DESCRIPTION</th>
                    <th width="125px">ACTION</th>
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
        </div>

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

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<!-- Masukkan ini di bagian head HTML Anda -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.2.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

@endsection
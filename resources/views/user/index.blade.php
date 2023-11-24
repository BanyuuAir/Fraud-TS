@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data user</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('user.create') }}"> Masukan Data user</a>
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
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Account Number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
                <?php $idx = 1; ?>
                @foreach ($user as $data)
                    <tr>
                        <td>{{ $idx }}</td>
                        <td>{{ $data->id}}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->account_number }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>
                            <form action="{{ route('user.destroy', $data->id) }}" method="Post">
                                <a class="btn btn-info" href="{{ route('user.show', $data->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('user.edit', $data->id) }}">Edit</a>
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
                        <a href="{{ $user->previousPageUrl() }}" class="btn-pagination" aria-label="Previous">&laquo; Previous</a>
                        @foreach(range(1, $user->lastPage()) as $i)
                            <a href="{{ $user->url($i) }}" class="btn-pagination {{ $user->currentPage() == $i ? 'active' : '' }}" aria-label="Go to page {{ $i }}">{{ $i }}</a>
                        @endforeach
                        <a href="{{ $user->nextPageUrl() }}" class="btn-pagination" aria-label="Next">Next &raquo;</a>
                    </div>
                </nav>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-warning" href="{{ route('welcome') }}">Home</a>
                </div>
            </div>
        </div>
@endsection
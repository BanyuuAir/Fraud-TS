@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Transaction</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('transaction.create') }}"> Masukan Data Transaction</a>
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
                    <th>waktu</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Account Destination</th>
                    <th>Channel</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
                <?php $idx = 1; ?>
                @foreach ($transaction as $data)
                    <tr>
                        <td>{{ $idx }}</td>
                        <td>{{ $data->id_user}}</td>
                        <td>{{ $data->time }}</td>
                        <td>{{ $data->account_number }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->account_destination }}</td>
                        <td>{{ $data->channel }}</td>
                        <td>
                            <form action="{{ route('transaction.destroy', $data->id) }}" method="Post">
                                <a class="btn btn-info" href="{{ route('transaction.show', $data->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('transaction.edit', $data->id) }}">Edit</a>
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
                        <a href="{{ $transaction->previousPageUrl() }}" class="btn-pagination" aria-label="Previous"><</a>
                        @foreach(range(1, $transaction->lastPage()) as $i)
                            <a href="{{ $transaction->url($i) }}" class="btn-pagination {{ $transaction->currentPage() == $i ? 'active' : '' }}" aria-label="Go to page {{ $i }}">{{ $i }}</a>
                        @endforeach
                        <a href="{{ $transaction->nextPageUrl() }}" class="btn-pagination" aria-label="Next">></a>
                    </div>
                </nav>
            </div>
        </div>
        
    <!-- Sub Button Section -->
    <div class="sub-btn">
        <a class="sub-link" href="{{ route('activity.index') }}">
            <img class ="" src="{{ asset('img/previous.png') }}" alt="Previous Button">
        </a>
        <a class="sub-link" href="{{ route('welcome') }}">
            <img class ="" src="{{ asset('img/home.png') }}" alt="Home Button">
        </a>
        <a class="sub-link" href="{{ route('form') }}">
            <img class ="" src="{{ asset('img/next.png') }}" alt="Next Button">
        </a>
    </div>
@endsection
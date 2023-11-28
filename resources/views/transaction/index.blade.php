@extends('layouts.app')

@section('content')
<div class="container mt-2">
        <!-- Add Button Section -->
        <div class="add-btn">
            <a class="add-link" href="{{ route('transaction.create') }}">
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
                        <div class="small-btn">
                                <form action="{{ route('transaction.destroy', $data->id) }}" method="POST">
                                    <!-- Show Button -->
                                    <a class="small-link" href="{{ route('transaction.show', $data->id) }}">
                                        <img src="{{ asset('img/show.png') }}" alt="Show Button" title="Show">
                                    </a>

                                    <!-- Edit Button -->
                                    <a class="small-link" href="{{ route('transaction.edit', $data->id) }}">
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
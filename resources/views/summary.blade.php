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

<img class="header" src="{{ asset('img/summary.png') }}" alt="Logo Halaman">

<div class="container">
    <div class="h2-font">
        <i> <h2>Insert Parameter Data</h2></i>
    </div>
    <form method="post" action="{{ route('process') }}">
        @csrf
        <div class="form-group">
            <label for="tanggal1">Start:</label>
            <input type="datetime-local" class="form-control" name="tanggal1" required>
        </div>
        <div class="form-group">
            <label for="tanggal2">Finish:</label>
            <input type="datetime-local" class="form-control" name="tanggal2" required>
        </div>
        <div class="form-group">
            <label for="acc">ID User:</label>
            <input type="text" class="form-control" name="acc" required>
        </div>
            <button type="submit" class="btn-back" style="cursor: pointer; background: none; border: none;">
                <img class ="" src="{{ asset('img/submit.png') }}" alt="Submit Button">
            </button>
    </form>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('formData'))
        <div class="h2-font">
            <i> <h2>Result</h2></i>
        </div>
        <table class="table">
            <tr>
                <th>Start</th>
                <th>Finish</th>
                <th>ID User</th>
            </tr>
            @php
                $formData = session('formData');
                $latestData = end($formData);
            @endphp
            <tr>
                <td>{{ $latestData['tanggal1'] }}</td>
                <td>{{ $latestData['tanggal2'] }}</td>
                <td>{{ $latestData['acc'] }}</td>
            </tr>
        </table>
    @endif
    <div class="h2-font">
        <i> <h2>Summary</h2></i>
    </div>
    <br>
    @if(isset($user))
        <h5>Data User:</h5>
        <table class="table">
            <tr>
                <li>Account Number : {{ $user->account_number }}</li><p>
                <li>Nama : {{ $user->username }}</li><p>
                <li>Telp. : {{ $user->phone }}</li><p>
                <li>Email : {{ $user->email }}</li><p>
            </tr>
        </table>
    @endif
    @if(isset($activity))
        <h5>Data Aktivitas:</h5>
        <table class="table">
            <tr>
                @foreach($activity as $activities)
                <li>
                    {{ $activities->time }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($activities->activityType !== null && $activities->activityType->activity_desc !== null)
                    {{ $activities->activityType->activity_desc }}
                    @else
                    {{ $activities->activity }}
                    @endif
                </li>
                @endforeach
            </tr>
        </table>
    @endif
    @if(isset($channel))
        <h5>Data Transaksi:</h5>
        <table class="table">
            <tr>
                @foreach($channel as $channels)  
                <li>
                {{ $channels->time }}&nbsp;&nbsp;&nbsp;
                Amount : {{ $channels->amount }}&nbsp;&nbsp;&nbsp;
                No.Rek. Tujuan : {{ $channels->account_destination }}&nbsp;&nbsp;&nbsp;
                Melalui : @if($channels->Channel !== null && $channels->Channel->channel_desc !== null )
                        {{ $channels->Channel->channel_desc }}
                    @else
                    {{ $channels->channel }}
                    @endif
                </li>
                @endforeach
            </tr>
        </table>
    @endif
    <!-- Sub Button Section -->
    <div class="sub-btn">
        <a class="sub-link" href="{{ route('transaction.index') }}">
            <img class ="" src="{{ asset('img/previous.png') }}" alt="Previous Button">
        </a>
        <a class="sub-link" href="{{ route('welcome') }}">
            <img class ="" src="{{ asset('img/home.png') }}" alt="Home Button">
        </a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Input Data</h2>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('formData'))
        <h2>Data Yang Telah Diinput:</h2>
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
    <h2>Summary:</h2><br>
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
    <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-warning" href="{{ route('welcome') }}">Home</a>
                </div>
            </div>
    </div>
</div>
@endsection

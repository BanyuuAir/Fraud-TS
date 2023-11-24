@extends('layouts.app')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
        <h1 style="font-size: 75px; text-align: center;">Fraud Tracking System (beta)</h1>
        <br><br>
        <div style="display: flex; flex-direction: row; justify-content: center; width: 80%; hight: 10%;">
            <div style="margin: 5px;">
                <a class="btn btn-danger btn-lg" href="{{ route('user.index') }}">Tambah Data User</a>
            </div>
            <div style="margin: 5px;">
                <a class="btn btn-primary btn-lg" href="{{ route('activity.index') }}">Tambah Data Aktivitas</a>
            </div>
            <div style="margin: 5px;">
                <a class="btn btn-warning btn-lg" href="{{ route('transaction.index') }}">Tambah Data Transaction</a>
            </div>
            <div style="margin: 5px;">
                <a class="btn btn-primary btn-lg" href="{{ route('channel.index') }}">Tambah Data Channel</a>
            </div>
            <div style="margin: 5px;">
                <a class="btn btn-secondary btn-lg" href="{{ route('activityType.index') }}">Tambah Data Activity Type</a>
            </div>
            <div style="margin: 5px;">
                <a class="btn btn-success btn-lg" href="{{ route('form') }}">Buat Summary</a>
            </div>
        </div>
    </div>
@endsection

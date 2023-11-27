@extends('layouts.app')

@section('content')
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="img/logo2.png" alt="Fraud Tracking Logo" width="200" height="100">
        </a>
    </nav>

    <!-- Image Background Section (Sebelah Kanan) -->
    <div class="col-md-6">
        <div class="video-background">
            <img class="background-image" src="{{ asset('img/penjelasan.gif') }}" alt="Background Image">
        </div>
    </div>

    <div class="explanation-box">
        <h2>FRAUD TRACKING</h2>
        <p>Fraud merupakan kecurangan yang telah disiapkan sedemikian rupa agar pelaku mendapatkan keuntungan dari sesuatu yang bukan haknya. Dari case-case yang telah terungkap, pelaku fraud melakukan modus operandi secara berkelompok. Di dalam teori fraud pun ada banyak skema kejahatan yang mungkin terjadi. Salah satu skema pendukungnya adalah penyalahgunaan otorisasi yang dapat dilakukan oleh pihak yang memiliki otorisasi maupun tidak dengan melakukan manipulasi pencatatan, pencurian account untuk melakukan kejahatan, maupun pencurian data yang bersifat rahasia.</p>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection

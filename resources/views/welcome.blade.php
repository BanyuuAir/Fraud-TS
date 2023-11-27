@extends('layouts.app')

@section('content')
    <!-- Navigation Bar -->
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('penjelasan') }}">
        <img src="img/logo2.png" alt="Fraud Tracking Logo" width="200" height="100">
    </a>
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

<!-- Image Background Section -->
<div class="video-background">
    <img class="background-image" src="{{ asset('img/wp.png') }}" alt="Background Image">
</div>

<!-- Start Button Section -->
<div class="start-btn">
    <a class="link" href="{{ route('user.index') }}">
        <img class ="" src="{{ asset('img/start.png') }}" alt="Start Button">
    </a>
</div>

<!-- Logo Image Section -->
<div class="imgbox">
    <img class="center-fit" src='img/bg.png'>
</div>

<!-- Rain Animation Section -->
<div class="rain-container">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const rainContainer = document.querySelector('.rain-container');
            const maxRaindrops = 15; // Jumlah maksimum raindrop

            function createRaindrop() {
                if (rainContainer.childElementCount < maxRaindrops) {
                    const raindrop = document.createElement('div');
                    raindrop.classList.add('raindrop');
                    raindrop.style.left = `${Math.random() * 100}vw`;
                    raindrop.style.animationDuration = `${Math.random() * 2 + 1}s`;
                    rainContainer.appendChild(raindrop);

                    // Menghapus elemen setelah selesai animasi
                    raindrop.addEventListener('animationend', function() {
                        rainContainer.removeChild(raindrop);
                    });
                }
            }

            // Membuat raindrop setiap 300ms
            setInterval(createRaindrop, 300);
        });
    </script>
</div>



<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection

